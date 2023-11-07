<x-table>

    <div class="px-6 py-4">
        <input type="text" wire:model="addItem" />
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($items as $item)
            <tr>
                <td class="text-center px-6 py-4 whitespace-nowrap">{{$item->name}}</td>
                <td class="text-center px-6 py-4 whitespace-nowrap">{{$item->quantity}}</td>
                <td class="text-center px-6 py-4 whitespace-nowrap">{{$item->price}}€</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-table>