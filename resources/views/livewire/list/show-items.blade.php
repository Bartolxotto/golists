<div>
    @if($list)
        <div>
            {{ $list->name }}
        </div>
    @else
        {{  __("Please, select a list.") }}
    @endif

</div>
