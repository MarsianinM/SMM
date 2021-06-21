@foreach($projectGroup as $item)
    <option value="{{ $item->id }}"
            {{--@isset($categoryRate->id)
                @if($item->id == $categoryRate->parent_id)
                selected="selected"
                @endif
                @if($item->id == $categoryRate->id)
                 hidden
                @endif
            @endisset--}}
           {{-- @isset($rate->category_id)
                @if($item->id == $rate->category_id)
                 selected="selected"
                @endif
            @endisset--}}
    >{!! $delimetr !!}{{ $item->name }}</option>
    @if(count($item->child))
        @include('projectgroup::front.client.block.select_tree',[
            'projectGroup' => $item->child,
            'delimetr' => '-'.$delimetr
            ])
    @endif
@endforeach

