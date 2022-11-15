@php use Illuminate\Support\Facades\Session; @endphp
use \Illuminate\Support\Facades\Session:class;
@extends('admin.layouts.master')

@section('content')
    @if (Session::has('delete_category'))
        <div class="alert alert-danger">
            <div>{{ session('delete_category') }}</div>
        </div>
    @endif
    @if (Session::has('update_category'))
        <div class="alert alert-success">
            <div>{{ session('update_category') }}</div>
        </div>
    @endif
    @if (Session::has('create_post'))
        <div class="alert alert-success">
            <div>{{ session('create_category') }}</div>
        </div>
    @endif

    <h3>لیست دسته بندی ها</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>تاریخ ایجاد</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{ route('category.edit', $category) }}">{{ $category->title }}</a></td>
                    <td>{{ verta($category->created_at) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
