<div>
    <x-danger-button class="w-full mt-4" wire:click="$set('open',true)">
        {{ __('Add list') }}
    </x-danger-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">{{ __('New list') }}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('List name') }}" />
                    <x-input type="text" class="w-full" wire:model="form.name"/>
                    <x-input-error for="form.name" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Description') }}" />
                    <x-input type="text" class="w-full" wire:model="form.description"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open',false)">{{ __('Cancel') }}</x-secondary-button>
                <x-danger-button class="ml-4 disabled:opacity-25" type="submit">{{ __('Save') }}</x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
