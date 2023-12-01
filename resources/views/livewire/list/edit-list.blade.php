<div>
    <x-secondary-button class="w-full mx-2 mt-2 py-2 justify-center" wire:click="$set('open',true)">
        <svg class="w-[23px] h-[23px] text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path
                    d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z" />
                <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </g>
        </svg>
    </x-secondary-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">{{ __('Edit list') }}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('List name') }}" />
                    <x-input type="text" class="w-full" wire:model="form.name" />
                    <x-input-error for="form.name" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Description') }}" />
                    <x-input type="text" class="w-full" wire:model="form.description" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Description') }}" />
                    <x-input type="text" class="w-full" wire:model="form.image" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="w-full flex justify-between">
                    <x-danger-button wire:click="delete">{{ __('Delete') }}</x-danger-button>
                    <div>
                        <x-secondary-button wire:click="$set('open',false)">{{ __('Cancel') }}</x-secondary-button>
                        <x-button class="ml-4 disabled:opacity-25" type="submit">{{ __('Save') }}</x-button>
                    </div>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>

</div>
