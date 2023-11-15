<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div>
                @if (count($products) > 0)
                    <x-table>

                        <div class="px-6 py-4">
                            <x-input type="text" placeholder="{{ __('Search category...') }}" class="w-full my-4"
                                wire:model.live="search" />
                        </div>

                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            </tbody>
                        </table>

                    </x-table>
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
