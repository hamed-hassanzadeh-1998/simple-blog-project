@extends('frontend.layaout.master')

@section('head')
<meta name="description" content="{{$post->meta_description}}">
<meta name="keywords" content="{{$post->meta_keywords}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('navigation')
    @include('partials.navigation', ['categories' => $categories])
@endsection

@section('sidebar')
@include('partials.sidebar',['categories'=>$categories])
@endsection

@section('content')
@if (Session::has('add_comment'))
<div class="alert alert-success">
    <div>{{ session('add_comment') }}</div>
</div>
@endif

    <!-- Title -->
    <h1 class="mt-4">
        {{ $post->title }}
    </h1>

    <!-- Author -->
    <p class="lead">
        ایجاد شده توسط : <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>منتشر شده در: {{ Verta::instance($post->created_at)->formatJalaliDate() }}</p>

    <hr>

    <!-- Preview Image -->
    <img src="{{ $post->photo ? $post->photo->path : 'http://placeimg.com/730/410/tech' }}" alt=""
        class="img-fluid img-circle">

<hr>

<p>
    {{$post->description}}
    </p>
    <hr>
 <!-- Comments Form -->
 @include('partials.form-errors')
 <div class="card my-4">
    <h5 class="card-header">ثبت نظر :</h5>
    <div class="card-body">
        {!! Form::open(['method'=>'POST','route'=>['frontend.comments.store',$post->id]]) !!}
        <div class="form-group">
            {!! Form::label('description',"توضیحات:") !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Single Comment -->
@include('partials.comments',['comments'=>$post->comments,'post'=>$post])

<!-- Comment with nested comments -->


@endsection
