@foreach($projectGroup as $group)
    <tr>
        <td data-label="ID">{{ $group->id }}</td>
        <td data-label="Название группы">
            {{$delimiter}} {{ $group->name }}
        </td>
        <td data-label="Проектов">{{ $group->count_project }}</td>
        <td style="text-align: right;">
            <img class="icon__blank" src="{{ asset('img/_src/comment__icon.png') }}" alt="comment__icon">
            <img class="icon__blank" src="{{ asset('img/_src/pancel__icon.png') }}" alt="korzina__icon">
            <img class="icon__blank" src="{{ asset('img/_src/korzina__icon.png') }}" alt="korzina__icon">
        </td>
    </tr>
    @if(!is_null($group->child))
        @include('projectgroup::front.client.block.group_tr',['projectGroup' => $group->child, 'delimiter' => '-'.$delimiter])
    @endif
@endforeach
