<div x-cloak x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    
    <div class="max-w-md mx-auto mt-10">
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Статус</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $status->status }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-blue-500 hover:text-blue-800">Изменить</a>
                            <a href="#" class="text-red-500 hover:text-red-800 ml-4">Удалить</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
