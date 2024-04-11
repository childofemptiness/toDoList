<div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">

    <div class="bg-white dark:bg-gray-800 text-grey-dark shadow-md p-6 rounded-lg h-1/3">

        <div class="mt-4 h-1/2">

            <x-input-label for="changedStatus" :value="__('Status')" />

            <select wire:model="changedStatus" wire:change="update" class="h-4" name="changedStatus">

                @foreach ($statusOptions as $status)

                    <option class="text-grey-dark" value="{{ $status }}">{{$status }}</option>

                @endforeach

            </select>
            
        </div>

        <button type="button" wire:click="toggleModal" class="mt-6 px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-bold  rounded">Закрыть окно</button>

    </div>

</div>
