{{-- <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 space-y-4">

    <div class="p-6 sm:p-4 mt-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> --}}

        <div class="px-4 py-8">

            <button wire:click="toggleModal" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Создать задачу</button>

            <div x-cloak x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                
                <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-lg w-2/5 h-4/6">
                   
                    <form wire:submit.prevent="submit" class="space-y-6 h-fit">
                      
                        <div>
                      
                            <x-input-label for="name" :value="__('Name')" />
                       
                            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" />
                      
                        </div>
                     
                        <div class="mt-4">
                       
                            <x-input-label for="description" :value="__('Description')" />
                       
                            <x-textarea-input wire:model="description" id="description" class="block mt-1 w-full" name="description"></x-textarea-input>
                       
                        </div>

                        <div class="mt-4">

                            <x-input-label for="selectedStatus" :value="__('Status')" />

                            <select wire:model="selectedStatus" class="h-4" name="selectedStatus">

                                @foreach ($statusOptions as $status)

                                    <option value="{{ $status }}">{{$status }}</option>

                                @endforeach

                            </select>
                            
                        </div>
                      
                        <div class="flex items-center justify-end mt-4"> 

                            <x-primary-button class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ $updateMode ? __('Обновить') : __('Создать')}}</x-primary-button>
                       
                            {{-- <button type="button" wire:click="submit()" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ $updateMode ? __('Обновить') : __('Создать')}}</button> --}}
                          
                            <button type="button" wire:click="toggleModal" class="mt-3 px-4 ml-2 py-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Закрыть окно</button>
                       
                        </div>
                   
                    </form>
               
                </div>
          
            </div>
      
        </div>
   
    {{-- </div>

</div> --}}
