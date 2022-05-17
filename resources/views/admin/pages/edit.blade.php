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

                    <form action="{{ route('admin.pages.update', [$page]) }}" method="POST">
                        <div class="card-header">{{ __('Edit Page') }}</div>
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-info">{{ session('message') }}</div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Title')}}</label>
                                        <input value="{{ $page->title }}" class="form-control" name="title" type="text">

                                        <label for="content">{{__('Content')}}</label>
                                        <textarea class="form-control" name="content" id="textarea" rows="5">{{ $page->content }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    @include('admin.ckEditor')

@endsection
