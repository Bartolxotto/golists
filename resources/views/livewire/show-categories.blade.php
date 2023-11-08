<x-table>

    <div class="px-6 py-4">
        <x-input type="text" class="w-full my-4" wire:model="addItem" />
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($categories as $category)
            <tr>
                <td class="text-center px-6 py-4 whitespace-nowrap">-</td>
                <td class="text-center px-6 py-4 whitespace-nowrap">{{$category->name}}</td>
                <td class="text-center px-6 py-4 whitespace-nowrap">{{$category->icon}}</td>
                <td class="text-center px-6 py-4 whitespace-nowrap">
                    <x-danger-button wire:click="delete">
                        <i class="fa-solid fa-trash"></i>
                    </x-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>   

</x-table>