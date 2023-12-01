<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div>

                <div class="px-6 py-4">
                    <x-input type="text" placeholder="{{ __('Search products...') }}" class="w-full my-4"
                        wire:model.live="search" />
                </div>

                @if (count($categories) > 0)

                    @foreach ($categories as $category)
                        <div wire:key="category-{{ $category->id }}" class="mb-4">
                            <x-table>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td colspan=2 class="w-full text-center font-extrabold p-2 bg-gray-200">
                                                {{ $category->icon }}{{ $category->name }}
                                            </td>
                                        </tr>
                                        @foreach ($category->products as $product)
                                            <tr wire:key="product-{{ $product->id }}">
                                                <td class="text-left px-6 py-4 whitespace-nowrap w-full">
                                                    <div class="w-full font-bold">{{ $product->name }}</div>
                                                    <div class="flex">
                                                        @foreach ($product->productAliases as $alias)
                                                            <div
                                                                class="inline-block bg-blue-100 text-xs rounded border mt-1 mr-2 px-2">
                                                                {{ $alias->name }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex flex-row">
                                                        @livewire('product.edit-product', ['product' => $product], key('product-edit-' . $product->id))
                                                        <div>
                                                            <x-danger-button class="ml-4"
                                                                wire:click="delete({{ $product }})">
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
                    <div class="mt-4">
                        {{ __("There're not products here") }}
                    </div>
                @endif
            </div>

            <div>
                @livewire('product.create-product')
            </div>
        </div>
    </div>
</div>
