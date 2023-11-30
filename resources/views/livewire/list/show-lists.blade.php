<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 flex">

            <div class="w-48 bg-gray-200 rounded-lg p-4">
                <div>
                    @if (count($lists) > 0)
                        @foreach ($lists as $list)
                            <a wire:navigate class="flex p-2 my-2 hover:bg-gray-400 rounded cursor-pointer" href="{{ route('lists') }}/{{ $list->id }}" >
                                <div class="grow font-bold">
                                    {{ $list->name }}
                                </div>
                                <div class="font-extrabold"> > </div>
                            </a>
                        @endforeach
                    @else
                        {{ __('No lists') }}
                    @endif
                </div>

                @livewire('list.create-list')

            </div>

            <div class="grow p-4">
                @livewire('list.show-items', ['list' => $selectedList])
            </div>

        </div>
    </div>
</div>
