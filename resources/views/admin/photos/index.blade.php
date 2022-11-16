@php use Illuminate\Support\Facades\Session; @endphp
use \Illuminate\Support\Facades\Session:class;
@extends('admin.layouts.master')

@section('content')
    @if (Session::has('delete_photo'))
        <div class="alert alert-danger">
            <div>{{ session('delete_photo') }}</div>
        </div>
    @endif



    <h3>لیست فایل ها</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>کاربر</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->path}}" class="img-thumbnail" width='50' alt=""></td>
                    <td>{{$photo->user->name}}</td>
                    <td>{{ verta($photo->created_at) }}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPhotoController@destroy',$photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('حذف ',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close()  !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12 text-center">
        {{$photos->links()}}
    </div>
@endsection
