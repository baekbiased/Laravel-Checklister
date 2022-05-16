<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard
            </a>
        </li>
        @if(auth()->user()->is_admin)

            <li class="nav-title">{{ __('Manage Checklists') }}</li>
            @foreach($admin_menu as $group)

                <li class="nav-group show"><a class="nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                        <svg class="nav-icon ">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                        </svg> <strong>{{ $group->name }}</strong>
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-down-alt') }}"></use>
                        </svg>

                    </a>
                    <ul class="nav-group-items ">
                        @foreach( $group->checklists as $checklist )
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"
                                   style="padding: .5rem .5rem .5rem 76px"
                                >
                                    <svg class="nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-arrow-right') }}"></use>
                                    </svg> {{ $checklist->name }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.checklist_groups.checklists.create', $group) }}"
                               style="padding: 1rem .5rem .5rem 76px"
                            >
                                <svg class="nav-icon">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-playlist-add') }}"></use>
                                </svg> {{ __('New Checklist') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endforeach
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.checklist_groups.create') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
                    </svg> {{ __('New Checklist Group') }}
                </a>
            </li>

            <li class="nav-title">{{ __('Pages') }}</li>
            @foreach(\App\Models\Page::all() as $page)

                <li class="nav-group">
                    <a class="nav-link" href="{{route('admin.pages.edit', $page)}}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
                        </svg> {{ $page->title }}
                    </a>
                </li>

            @endforeach

            <li class="nav-title">{{ __('Manage data') }}</li>
            <li class="nav-group">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                    </svg> {{ __('Users') }}
                </a>
            </li>
        @else
            @foreach($user_menu as $group)
                <li class="nav-title">{{ $group['name'] }}
                    @if($group['is_new'])
                        <span class="badge badge-sm bg-info ms-auto">NEW</span>
                    @elseif($group['is_updated'])
                        <span class="badge badge-sm bg-info ms-auto">UPD</span>
                    @endif
                </li>

                <ul class="nav-group-items ">
                        @foreach( $group['checklists'] as $checklist )
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('user.checklists.show', $checklist['id']) }}"
                                   style="padding: .5rem .5rem .5rem 76px"
                                >
                                    <svg class="nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-arrow-right') }}"></use>
                                    </svg> {{ $checklist['name'] }}
                                    @if($checklist['is_new'])
                                        <span class="badge badge-sm bg-info ms-auto">NEW</span>
                                    @elseif($checklist['is_updated'])
                                        <span class="badge badge-sm bg-info ms-auto">UPD</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
            @endforeach

        @endif


    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
