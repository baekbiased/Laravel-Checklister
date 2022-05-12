<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Dashboard
            </a>
        </li>
        @if(auth()->user()->is_admin)

            <li class="nav-title">{{ __('Manage Checklists') }}</li>
            @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)

                <li class="nav-group show"><a class="nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                        <svg class="nav-icon ">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                        </svg> <strong>{{ $group->name }}</strong>
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-down-alt"></use>
                        </svg>

                    </a>
                    <ul class="nav-group-items ">
                        @foreach( $group->checklists as $checklist )
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                                    <svg class="nav-icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-right"></use>
                                    </svg> {{ $checklist->name }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.checklist_groups.checklists.create', $group) }}">
                                <svg class="nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-playlist-add"></use>
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
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                    </svg> {{ __('New Checklist Group') }}
                </a>
            </li>

            <li class="nav-title">{{ __('Pages') }}</li>
            @foreach(\App\Models\Page::all() as $page)

                <li class="nav-group">
                    <a class="nav-link" href="{{route('admin.pages.edit', $page)}}">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                        </svg> {{ $page->title }}
                    </a>
                </li>

            @endforeach

            <li class="nav-title">{{ __('Manage data') }}</li>
            <li class="nav-group">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <svg class="nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> {{ __('Users') }}
                </a>
            </li>



                @endif


    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
