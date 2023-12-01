<div>
    @if ($list)
        <div class="px-6 flex">
            <x-input type="text" placeholder="{{ __('Search category...') }}" class="w-full my-2"
                wire:model.live="search" />
            @livewire('list.edit-list', ['list' => $list], key($list->id))
        </div>

        <div class="w-full">
            <div class="mx-6 my-2">{{ $list->description }}</div>
        </div>
    @else
        {{ __('Please, select a list.') }}
    @endif

</div>
