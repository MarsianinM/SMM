@foreach($categories as $item)
    <option value="{{ $item->id }}"
            @isset($categoryRate->id)
                @if($item->id == $categoryRate->parent_id)
                 selected
                @endif
                @if($item->id == $categoryRate->id)
                 hidden
                @endif
            @endisset
    >{!! $delimetr !!}{{ $item->content_current_lang->title }}</option>
    @if(count($item->children))
        @include('rates::admin.select.category_tree',[
            'categories' => $item->children,
            'delimetr' => '-'.$delimetr
            ])
    @endif
@endforeach

