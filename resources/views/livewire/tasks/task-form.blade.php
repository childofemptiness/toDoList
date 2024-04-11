<div class="px-4 py-8">

    <button wire:click="toggleModal" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold ml-10 rounded">Создать задачу</button>

    <div x-cloak x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-lg w-2/5 h-2/5">
            
            <form wire:submit.prevent="submit" class="space-y-6 h-full">
                
                <div>
                
                    <x-input-label for="name" :value="__('Название')" />
                
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full text-white" type="text" name="name" />
                
                </div>
                
                <div class="mt-4">
                
                    <x-input-label for="description" :value="__('Описание')" />
                
                    <x-textarea-input wire:model="description" id="description" class="block mt-1 w-full" name="description"></x-textarea-input>
                
                </div>
                
                <div class="flex items-center justify-end"> 

                    <x-primary-button class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ $updateMode ? __('Обновить') : __('Создать')}}</x-primary-button>
                                    
                    <button type="button" wire:click="toggleModal" class="mt-3 px-4 ml-2 py-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Закрыть окно</button>
                
                </div>
            
            </form>
        
        </div>
    
    </div>

</div>
