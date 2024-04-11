<div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    
    <div class="bg-white dark:bg-gray-800 text-white shadow-md p-6 rounded-lg">
       
        <table class="text-left w-full border-collapse">
            
            <thead>
               
                <tr>
                    
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Статус</th>
                    
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Дата</th>
               
                </tr>
           
            </thead>
           
            <tbody>
               
                @foreach ($statuses as $status)
               
                <tr class="hover:bg-grey-lighter">
               
                    <td class="py-4 px-6 border-b border-grey-light">{{ $status->status }}</td>
               
                    <td class="py-4 px-6 border-b border-grey-light">{{ $status->created_at }}</td>
               
                </tr>
               
                @endforeach
            
            </tbody>
        
        </table>
        
        <button type="button" wire:click="toggleModal" class="m-3 px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-bold  rounded">Закрыть окно</button>
    
    </div>

</div>
