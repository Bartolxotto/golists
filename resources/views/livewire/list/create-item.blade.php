<div>
    <div class="px-6 mt-2 flex">
        <input wire:keydown.enter="addNewProduct()" type="text"
            class="w-full rounded-l px-4 py-2 border-2 border-gray-800" placeholder="{{ __('Select an item...') }}"
            wire:model.live="search" />
        <button wire:click="addNewProduct()"
            class="rounded-r px-4 py-2 bg-gray-800 text-white">{{ __('Add') }}</button>
    </div>

    @if (strlen($search) > 0)

        <div class="absolute z-10 mx-6 py-4 px-6 bg-white border border-gray-600 rounded-md shadow-lg">
            <ul>
                @foreach ($products as $product)
                    <li wire:key="item-search.{{ $product->id }}" wire:click="addExistingProduct({{ $product->id }})"
                        class="cursor-pointer hover:bg-gray-200 my-4 py-2">
                        <span class="font-bold">{{ $product->name }}</span>
                        <span class="italic text-xs">
                        (@foreach ($product->productAliases as $alias)
                            {{ $alias->name }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach)
                    </li>
                @endforeach
            </ul>
            @if (count($products) === 0)
                <p>No se encontraron productos que coincidan con su búsqueda. <br />¿Desea crear un nuevo producto?</p>
            @endif
        </div>

    @endif


</div>
