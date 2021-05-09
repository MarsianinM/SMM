@foreach($project_group as $item)
    <option value="{{ $item->id }}"
            @isset($project_id)
                @if($item->id == $project_id)
                    selected="selected"
                @endif
            @endisset
    >{!! $delimiter !!}{{ $item->name }}</option>
    @if(count($item->child))
        @include('project::front.block.group',[
            'project_group'     => $item->child,
            'delimiter'         => '-'.$delimiter,
            'project_id'        => $project->id ?? 0
            ])
    @endif
@endforeach
