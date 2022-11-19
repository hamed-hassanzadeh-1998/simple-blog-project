@extends('frontend.layaout.master')

@section('navigation')
@include('partials.navigation',['categories'=>$categories])
@endsection

@section('sidebar')
@include('partials.sidebar',['categories'=>$categories])
@endsection

@section('content')
    <h1 class="mt-4">
        اخرین مطلب
    </h1>

    @foreach ($posts as $post)
        <!-- Title -->
        <h1 class="mt-4"><a href="{{ route('f.posts.show',$post->slug)}}">
        {{$post->title}}
        </a></h1>

        <!-- Author -->
        <p class="lead">
               ایجاد شده توسط :  <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>منتشر شده در:   {{Verta::instance($post->created_at)->formatJalaliDate()}}</p>

        <hr>

        <!-- Preview Image -->
        <img src="{{ $post->photo ? $post->photo->path : 'http://placeimg.com/730/410/tech' }}" alt=""
        class="img-fluid img-circle">

        <hr>

        <!-- Post Content -->
       <div>
        {{ Str::limit($post->description,120)}}
       </div>
    <div class="col-md-12 text-right">
        <a href="{{ route('f.posts.show', $post->slug) }}" class="btn btn-primary text-right"> ادامه مطلب</a>
    </div>
        <hr>

    @endforeach
    {{$posts->links()}}
@endsection
