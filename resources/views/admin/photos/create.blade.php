@extends('admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection
@section('content')
    @if (Session::has('file_uploaded'))
        <div class="alert alert-success">
            <div>{{ session('file_uploaded') }}</div>
        </div>
    @endif

    <h3>آپلود فایل</h3>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('partials.form-errors')
            {!! Form::open(['method' => 'POST', 'route' => 'photos.store', 'class' => 'dropzone']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
