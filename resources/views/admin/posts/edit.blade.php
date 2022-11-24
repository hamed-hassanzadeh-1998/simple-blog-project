@extends('admin.layouts.master')

@section('content')
    <h3>ویرایش مطلب</h3>

    <div class="row">
        <div class="col-md-3">
            <img src="{{$post->photo?$post->photo->path : "https://via.placeholder.com/400"}}" alt=""
                 class="img-fluid img-circle img-thumbnail">
        </div>
        <div class="col-md-9">
            @include('partials.form-errors')
            {!! Form::model($post,['method'=>'PATCH','action'=>['Admin\AdminPostController@update',$post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title',"عنوان مطلب:") !!}
                {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug',"نام مستعار:") !!}
                {!! Form::text('slug',$post->slug,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category',"دسته بندی:") !!}
                {!! Form::select('category',$categories,$post->category->id,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description',"توضیحات:") !!}
                {!! Form::textarea('description',$post->description,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status',"وضعیت:") !!}
                {!! Form::select('status',[0=>'غیرفعال',1=>'فعال'], $post->status,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('first_photo','تصویر اصلی : ') !!}
                {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description',"متای توضیحات:") !!}
                {!! Form::textarea('meta_description',$post->meta_description,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords',"متای برچسب ها:") !!}
                {!! Form::textarea('meta_keywords',$post->meta_keywords,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('بروز رسانی',['class'=>'btn btn-success col-md-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPostController@destroy',$post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف مطلب',['class'=>'btn btn-danger col-md-3']) !!}
            </div>
            {!! Form::close()  !!}
        </div>
    </div>

@endsection

