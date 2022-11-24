@extends('admin.layouts.master')

@section('content')
    @if (Session::has('delete_comment'))
        <div class="alert alert-danger">
            <div>{{ session('delete_comment') }}</div>
        </div>
    @endif
    @if (Session::has('update_comment'))
        <div class="alert alert-success">
            <div>{{ session('update_comment') }}</div>
        </div>
    @endif
    @if (Session::has('approved_comment'))
        <div class="alert alert-success">
            <div>{{ session('approved_comment') }}</div>
        </div>
    @endif
    @if (Session::has('rejected_comment'))
        <div class="alert alert-danger">
            <div>{{ session('rejected_comment') }}</div>
        </div>
    @endif

    <h3>لیست نظرات</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>توضیحات</th>
                <th>مطلب</th>
                <th>تاریخ ایجاد</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td><a href="{{ route('comments.edit', $comment) }}">{{ $comment->description }}</a></td>
                    <td>{{ $comment->posts->title }}</td>
                    <td>{{ verta($comment->created_at) }}</td>
                    @if ($comment->status === 0)
                        <td>
                            <span class="tag tag-pill tag-danger">منتشر نشده</span>
                        </td>
                    @else
                        <td>
                            <span class="tag tag-pill tag-success"> منتشر شده</span>
                        </td>
                    @endif
                    @if ($comment->status === 0)
                    <td>
                        {!! Form::open(['method' => 'post', 'route' => ['comments.action' , $comment->id]]) !!}
                        <div class="form-group">
                            {!!Form::hidden('action', 'approved')!!}
                            {!! Form::submit('تایید', ['class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    @else
                    <td>
                        {!! Form::open(['method' => 'post','route' => ['comments.action', $comment->id]]) !!}
                        <div class="form-group">
                            {!!Form::hidden('action', 'rejected')!!}
                            {!! Form::submit('عدم تایید', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $comments->links() }}
@endsection
