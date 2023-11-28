<div>
    <x-danger-button class="w-full mt-4" wire:click="$set('open',true)">
        {{__('Add product')}}
    </x-danger-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">{{__('Add product')}}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{__('Product name')}}" />
                    <x-input type="text" class="w-full" wire:model="form.name" />
                    <x-input-error for="form.name" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Category name') }}" />
                    <select class="w-full" wire:model="form.category_id">                           
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open',false)">{{__('Cancel')}}</x-secondary-button>
                <x-danger-button class="ml-4 disabled:opacity-25" type="submit">{{__('Save')}}</x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
