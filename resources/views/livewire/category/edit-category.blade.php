<div>
    <x-button wire:click="$set('openEdit',true)">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <x-dialog-modal wire:model="openEdit">
        <x-slot name="title" class="text-left">{{ __('Edit category') }}: {{ $form->name }}</x-slot>

        <x-slot name="content">
            <div class="mb-4 text-left">
                <x-label value="{{ __('Category name') }}" />
                <x-input wire:model="form.name" type="text" class="w-full" />
                <x-input-error for="form.name" />

            </div>
            <div>
                <x-label value="{{ __('Category icon') }}" />
                <div wire:click="$toggle('openEmojiPicker')" wire:model="form.icon"
                    class="w-full rounded-md border bg-white cursor-pointer h-10 p-2"> {{ $form->icon }}</div>
                <x-input type="text" wire:model="form.icon" class="w-full hidden"
                    placeholder="{{ __('Select an icon') }}" disabled />
                <x-input-error for="form.icon" />
            </div>

            @if ($openEmojiPicker)
                <div
                    class="relative z-10 bg-white border rounded-md shadow-lg py-2 px-3 mt-1 flex flex-wrap overflow-y-auto h-32">
                    @foreach ($emojis as $category => $items)
                        <div class="m-2 w-full flex font-bolder capitalize">{{ $category }}</div>
                        <div class="flex-wrap">
                            @foreach ($items as $emoji)
                                <div wire:click="$set('form.icon','{{ $emoji }}')"
                                    class="p-2 my-1 mx-1 inline-block hover:bg-gray-200 cursor-pointer ">
                                    {{ $emoji }}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openEdit',false)"
                class="">{{ __('Cancel') }}</x-secondary-button>
            <x-danger-button wire:click="save" class="ml-4 disabled:opacity-25" wire:loading.attr="disabled"
                wire:target="save">{{ __('Save') }}</x-danger-button>
        </x-slot>
    </x-dialog-modal>


</div>
