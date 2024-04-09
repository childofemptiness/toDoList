<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        
        {{ __('Список задач') }}
    
    </h2>

</x-slot>

<div class="py-12">

    @livewire('tasks.task-form')

    <div class="mx-auto sm:px-6 lg:px-8 space-y-4" style="max-width: 640px;"> <!-- Установим стиль для максимальной ширины -->
    
        <div class="p-6 sm:p-4 mt-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    
            <div class="w-full px-4 py-2">

                <table class="min-w-full leading-normal mt-5 shadow-md rounded-lg overflow-hidden border-collapse">

                    <thead>

                        <tr class="bg-gray-800 text-white">

                            <th class="py-3 px-5 text-left border-b-2 border-gray-300">No.</th>

                            <th class="py-3 px-5 text-left border-b-2 border-gray-300">Name</th>

                            <th class="py-3 px-5 text-left border-b-2 border-gray-300">Description</th>

                            <th class="py-3 px-5 text-left border-b-2 border-gray-300" width="150px">Action</th>

                        </tr>

                    </thead>
                
                    <tbody class="text-white bg-gray-800">

                        @foreach($tasks as $task)

                            <tr class="border-b border-gray-700" wire:key="task-{{ $task->id }}">

                                <td class="py-2 px-5">{{ $task->id }}</td>

                                <td class="py-2 px-5">{{ $task->name }}</td>

                                <td class="py-2 px-5">{{ $task->description }}</td>

                                <td class="py-2 px-5">

                                    <div class="flex items-center justify-end mt-4">

                                        <x-primary-button wire:click="edit( {{ $task->id }})" class="mr-4">Edit</x-primary-button>

                                        <x-primary-button wire:click="delete({{ $task->id }})">Delete</x-primary-button>    

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                
                </table>                
                    
            </div>
        
        </div>
    
    </div>

</div>