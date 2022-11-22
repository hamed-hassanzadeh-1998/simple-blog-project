@extends('admin.layouts.master')

@section('content')
    <h3>ویرایش کاربر {{$user->name}}</h3>

    <div class="row">
        <div class="col-md-3">
            <img src="{{$user->photo?$user->photo->path : "https://via.placeholder.com/400"}}" alt="" class="img-fluid img-circle img-thumbnail">
        </div>
        <div class="col-md-9">
            @include('partials.form-errors')
            {!! Form::model($user,['method'=>'PATCH','action'=>['Admin\AdminUserController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name',"نام:") !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',"ایمیل:") !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('roles',"نقش:") !!}
                {!! Form::select('roles[]',$roles,null,['multiple'=>'multiple','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status',"وضعیت:") !!}
                {!! Form::select('status',[0=>'غیرفعال',1=>'فعال'], 1,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('avatar','تصویر پروفایل') !!}
                {!! Form::file('avatar',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',"رمز عبور:") !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('بروز رسانی',['class'=>'btn btn-success col-md-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminUserController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف کاربر',['class'=>'btn btn-danger col-md-3']) !!}
            </div>
            {!! Form::close()  !!}
        </div>
    </div>



@endsection

