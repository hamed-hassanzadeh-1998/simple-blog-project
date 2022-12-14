@php use Illuminate\Support\Facades\Session; @endphp
use \Illuminate\Support\Facades\Session:class;
@extends('admin.layouts.master')

@section('content')
    @if (Session::has('delete_post'))
        <div class="alert alert-danger">
            <div>{{ session('delete_post') }}</div>
        </div>
    @endif
    @if (Session::has('update_post'))
        <div class="alert alert-success">
            <div>{{ session('update_post') }}</div>
        </div>
    @endif
    @if (Session::has('create_post'))
        <div class="alert alert-success">
            <div>{{ session('create_post') }}</div>
        </div>
    @endif

    <h3>لیست کاربران</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>عنوان</th>
                <th>کاربر</th>
                <th>توضیحات</th>
                <th>دسترسی بندی</th>
                <th>وضعیت</th>
                <th>تاریخ ایجاد</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><img src="{{ $post->photo ? $post->photo->path : 'https://via.placeholder.com/400' }}" alt=""
                            class="img-fluid img-circle" width="65"></td>
                    <td><a href="{{ route('posts.edit', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ Str::limit($post->description, 100) }}</td>
                    <td>
                        {{ $post->category->title }}
                    </td>
                    @if ($post->status === 0)
                        <td>
                            <span class="tag tag-pill tag-danger">غیرفعال</span>
                        </td>
                    @else
                        <td>
                            <span class="tag tag-pill tag-success"> فعال</span>
                        </td>
                    @endif
                    <td>{{ verta($post->created_at) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="md-12">
    {{$posts->links()}}
    </div>
@endsection
