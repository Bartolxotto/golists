<div>
    @if ($list)
        <div class="px-6 flex">
            <x-input type="text" placeholder="{{ __('Search products...') }}" class="w-full my-2"
                wire:model.live="search" />
            @livewire('list.edit-list', ['list' => $list], key($list->id))
        </div>

        <div class="w-full">
            <div class="mx-6 my-2">{{ $list->description }}</div>

            <x-button class="w-full justify-center">{{ __('ADD') }}</x-button>

            @if(count($items)> 0)

            @else
                <div class="text-center">
                    <img class="mx-auto w-1/5 h-3/4 mt-6" src="{{ asset('images/empty_cart.jpeg') }}" alt="Descripción de la imagen">
                </div>
                <div class="mb-6 text-center font-extrabold">{{ __('Empty list') }}</div>
            @endif

            <x-button class="w-full justify-center">{{ __('ADD') }}</x-button>

        </div>
    @else
        {{ __('Please, select a list.') }}
    @endif

</div>
