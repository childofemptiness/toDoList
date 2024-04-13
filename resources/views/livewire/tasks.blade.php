<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        
        {{ __('Список задач') }}
    
    </h2>

</x-slot>

<div class="py-12">

    <livewire:tasks.task-form @saved="render">

    <div class="mx-auto sm:px-6 lg:px-8 space-y-4" style="max-width: 1420px;">
    
        <div class="p-6 sm:p-4 mt-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    
            <div class="w-full px-4 py-2">

                <div class="mt-4">

                    <x-input-label for="filter" :value="__('Фильтр')" class="mb-2"/>
        
                    <select wire:model.lazy="filter" wire:change="search" class="h-4" name="filter">

                        <option value="">По умолчанию</option>

                        @foreach ($statusOptions as $status)
        
                            <option class="text-grey-dark" value="{{ $status }}">{{$status }}</option>
        
                        @endforeach
        
                    </select>
                    
                </div>

                <table class="min-w-full leading-normal mt-5 shadow-md rounded-lg overflow-hidden border-collapse text-center">

                    <thead>

                        <tr class="bg-gray-800 text-white">

                            <th class="py-3  border-b-2 border-gray-300">{{ __('Название задачи') }}</th>

                            <th class="py-3  border-b-2 border-gray-300">{{ __('Описание задачи') }}</th>

                            <th class="py-3  border-b-2 border-gray-300">{{ __('Текущий статус') }}</th>

                            <th class="py-3  border-b-2 border-gray-300"> {{ __('Действия') }} </th>

                        </tr>

                    </thead>
                
                    <tbody class="text-white bg-gray-800">

                        @foreach($tasks as $task)

                            <tr class="border-b border-gray-700 text-center" wire:key="task-{{ $task->id }}">

                                <td class="p-1 ">{{ $task->name }}</td>

                                <td class="p-1 max-w-52">{{ $task->description }}</td>

                                <td class="p-1 ">{{ $task->status->status ?? 'No status'}}</td>

                                <td class="p-1 ">

                                    <div class="flex items-center justify-center mt-2 mb-2">

                                        <x-primary-button wire:click="edit( {{ $task->id }})" class="mr-4">{{ __('Изменить') }}</x-primary-button>

                                        <x-primary-button wire:click="delete( {{ $task->id }} )">{{ __('Удалить') }}</x-primary-button> 
                                        
                                        <x-primary-button wire:click="showStatusHistory( {{ $task->id }} )" class="ml-4">{{ __('История статусов') }}</x-primary-button>
                                        
                                        <x-primary-button wire:click="editStatus( {{ $task->id }} )" class="ml-4">{{ __('Изменить статус') }}</x-primary-button>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                
                </table>

                <div class="mt-4">

                    {{ $tasks->links() }}

                </div>
                    
            </div>
        
        </div>
    
    </div>

    @livewire('status-history', ['taskId' => $taskId])

    @livewire('change-status')

</div>
