<div>
    <x-button wire:click="$set('openEdit',true)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="openEdit">
            <x-slot name="title">{{ __('Add product') }}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Product name') }}" />
                    <x-input type="text" class="w-full" wire:model="form.name" />
                    <x-input-error for="form.name" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Category name') }}" />
                    <select class="w-full border-gray-200" wire:model="form.category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->icon }} {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <x-label value="{{ __('Alias') }}" />
                    <div class="flex">
                        <input class="grow rounded-l w-full border-gray-200" type="text" wire:model="aliasInput">
                        <button class="flex-none border rounded-r bg-blue-600 p-2 text-white"
                            wire:click.prevent="addAlias">{{ __('Add') }}
                        </button>
                    </div>
                    <div class="my-2 flex">
                        @foreach ($aliasProduct as $alias)   
                        <div class="inline-block flex mx-2">                    
                                <div
                                    class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded-l">
                                    {{ $alias->name }}
                                </div>
                                <button class="border bg-blue-400 py-0.5 px-2 rounded-r text-white"
                                    wire:click.prevent="deleteAlias({{ $alias->id }})"> X </button>
                        </div>
                            
                        @endforeach
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('openEdit',false)">{{ __('Cancel') }}</x-secondary-button>
                <x-danger-button class="ml-4 disabled:opacity-25" type="submit">{{ __('Save') }}</x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </form>

</div>
