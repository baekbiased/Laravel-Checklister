@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
                        <div class="card-header">{{ __('Edit Checklist') }}</div>
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input value="{{ $checklist->name }}" class="form-control" name="name" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{__('Save Checklist')}}</button>

                        </div>
                    </form>
                </div>
                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm( '{{ __('Are you sure?') }}' )"
                            type="submit">{{__('Delete this checklist')}}</button>
                </form>

                <hr>

                <div class="card">
                    <div class="card-header">{{ __('List of Tasks') }}</div>
                    <div class="card-body">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 preview active" role="tabpanel" id="preview-103">
                                @livewire('tasks-table', ['checklist' => $checklist])
                            </div>

                        </div>
                    </div>

                </div>

                <hr>

                <div class="card">
                    @if($errors->storetask->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->storetask->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                        <div class="card-header">{{ __('New Task') }}</div>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Description">{{__('Description')}}</label>
                                        <textarea class="form-control" id="task-textarea" name="description" rows="5">{{ old('description') }}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{__('Save Task')}}</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#task-textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection


