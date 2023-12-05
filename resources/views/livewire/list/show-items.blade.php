<div>
    @if ($list)
        <div class="w-full">
            <div class="mx-6 my-2 text-center">{{ $list->description }}</div>
            <div class="px-6 flex">
                <div class="w-full grow">
                    @livewire('list.create-item', ['list' => $list], key('top-' . $list->id))
                </div>
                <div>
                    @livewire('list.edit-list', ['list' => $list], key($list->id))
                </div>
            </div>

            @if (count($items) > 0)

                @foreach ($items->groupBy('category_name') as $category => $items)
                    <div wire:key="category-{{ $category }}" class="my-4">
                        <x-table>
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td colspan=2 class="w-full text-center font-extrabold p-2 bg-gray-200">
                                            {{ $items[0]->category_icon }} {{ $category }}
                                        </td>
                                    </tr>

                                    @foreach ($items as $item)
                                        <tr wire:key="product-item-{{ $item->id }}">
                                            <td wire:click="checked({{ $item->id }})"
                                                class="cursor-pointer text-left px-6 py-2 whitespace-nowrap w-full {{ $item->checked ? 'text-gray-300 line-through' : '' }}">
                                                {{ $item->product_name }}</td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="flex flex-row">
                                                    <div>
                                                        <button wire:click="addQuantity({{ $item->id }})"
                                                            class="text-xl px-2 bg-gray-300 rounded">+</button>
                                                        <x-input class="w-10 text-center" disabled
                                                            value="{{ $item->quantity }}"></x-input>
                                                        <button wire:click="subtractQuantity({{ $item->id }})"
                                                            class="text-xl px-2 bg-gray-300 rounded"
                                                            {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                                    </div>
                                                    <div>
                                                        <x-danger-button class="ml-4 mt-1"
                                                            wire:click="delete({{ $item->id }})"
                                                            wire:confirm="{{ __('Are you sure you want to delete this item?') }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </x-danger-button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </x-table>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <img class="mx-auto w-1/5 h-3/4 mt-6" src="{{ asset('images/empty_cart.jpeg') }}"
                        alt="Descripción de la imagen">
                </div>
                <div class="mb-6 text-center font-extrabold">{{ __('Empty list') }}</div>
            @endif

        </div>
    @else
        {{ __('Please, select a list.') }}
    @endif

</div>
