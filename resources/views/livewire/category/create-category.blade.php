<div>
    <x-button class="w-full mt-4 justify-center" wire:click="$set('open',true)">
        {{ __('New category') }}
    </x-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">{{ __('Add category') }}</x-slot>

            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="{{ __('Category name') }}" />
                    <x-input type="text" class="w-full" wire:model="form.name" />
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
                                        class="p-2 my-1 mx-1 inline-block hover:bg-gray-200 cursor-pointer">
                                        {{ $emoji }}
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif


            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('open',false)">{{ __('Cancel') }}</x-secondary-button>
                <x-button class="ml-4 disabled:opacity-25" type="submit">{{ __('Save') }}</x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
