<div>
    <x-button wire:click="$set('open',true)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title" class="text-left">{{__('Edit category')}}: {{$category->name}}</x-slot>

        <x-slot name="content">
            <div class="mb-4 text-left">
                <x-label value="{{__('Category name')}}" />
                <x-input wire:model="name" type="text" class="w-full" />
                <x-input-error for="name" />

            </div>
            <div class="mb-4 text-left">
                <x-label value="{{__('Category icon')}}" />
                <x-input wire:model="icon" type="text" class="w-full"  />
                <x-input-error for="icon" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)" class="">{{__('Cancel')}}</x-secondary-button>
            <x-danger-button wire:click="save" class="ml-4 disabled:opacity-25" wire:loading.attr="disabled" wire:target="save">{{__('Save')}}</x-danger-button>
        </x-slot>
    </x-dialog-modal>


</div>