@foreach($projectGroup as $group)
    <tr
        data-parent_id="{{ $group->parent_id }}"
        data-show="{{ $group->show }}"
        data-show_children_group="{{ $group->show_children_group }}"
        data-name="{{ $group->name }}"
        data-id="{{ $group->id }}"
    >
        <td>{{ $group->id }}</td>
        <td>
            {{$delimiter}} {{ $group->name }}
        </td>
        <td>{{ $group->count_project }}</td>
        <td style="text-align: right;">
            <a  href="#edit_projectGroup-form" rel="modal:open">
                <img class="icon__blank" src="{{ asset('img/_src/pancel__icon.png') }}" alt="korzina__icon">
            </a>
            <a class="submit_group">
                <svg class="icon__blank" width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 4.47217V1.2334C22 0.877445 21.7114 0.588867 21.3555 0.588867H0.644531C0.288578 0.588867 0 0.877445 0 1.2334V4.47217H22Z" {{--fill="#92A2BB"--}}/>
                    <path d="M9.70557 9.6499H12.2944C12.6528 9.6499 12.9443 9.35836 12.9443 9C12.9443 8.64164 12.6528 8.3501 12.2944 8.3501H9.70557C9.34721 8.3501 9.05566 8.64164 9.05566 9C9.05566 9.35836 9.34721 9.6499 9.70557 9.6499Z" {{--fill="#92A2BB"--}}/>
                    <path d="M1.29443 5.76123V16.7666C1.29443 17.1226 1.58301 17.4111 1.93896 17.4111H20.061C20.417 17.4111 20.7056 17.1226 20.7056 16.7666V5.76123H1.29443ZM9.70557 7.06104H12.2944C13.3636 7.06104 14.2334 7.93085 14.2334 9C14.2334 10.0691 13.3636 10.939 12.2944 10.939H9.70557C8.63642 10.939 7.7666 10.0691 7.7666 9C7.7666 7.93085 8.63642 7.06104 9.70557 7.06104Z" {{--fill="#92A2BB"--}}/>
                </svg>
            </a>
            {{--<img class="icon__blank" src="{{ asset('img/_src/comment__icon.png') }}" alt="comment__icon">
            <img class="icon__blank" src="{{ asset('img/_src/korzina__icon.png') }}" alt="korzina__icon">--}}
            <form style="display: none" action="{{ route('client.project-group-destroy') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $group->id }}">
                <button type="submit" class="sub"></button>
            </form>
        </td>
    </tr>
    @if(!is_null($group->child))
        @include('projectgroup::front.client.block.group_tr',[
                'projectGroup' => $group->child,
                'delimiter' => '-'.$delimiter
                ])
    @endif
@endforeach
