<div>
    <x-danger-button class="w-full mt-4" wire:click="$set('open',true)">
        {{__('Add category')}}
    </x-danger-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">{{__('Add category')}}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{__('Category name')}}" />
                    <x-input type="text" class="w-full" wire:model="name" />
                    <x-input-error for="name" />

                </div>
                <div class="mb-4">
                    <x-label value="{{__('Category icon')}}" />
                    <x-input type="text" class="w-full" wire:model="icon" />
                    <x-input-error for="icon" />

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open',false)" class="">{{__('Cancel')}}</x-secondary-button>
                <x-danger-button class="ml-4 disabled:opacity-25" wire:loading.attr="disabled" wire:target="save">{{__('Save')}}</x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>