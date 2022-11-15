@extends('admin.layouts.master')

@section('content')
    <h3>ویرایش دسته بندی</h3>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('partials.form-errors')
            {!! Form::model($category,['method'=>'PATCH','action'=>['Admin\AdminCategoryController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::label('title',"عنوان دسته بندی:") !!}
                {!! Form::text('title',$category->title,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug',"نام مستعار:") !!}
                {!! Form::text('slug',$category->slug,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description',"متای توضیحات:") !!}
                {!! Form::textarea('meta_description',$category->meta_description,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords',"متای برچسب ها:") !!}
                {!! Form::textarea('meta_keywords',$category->meta_keywords,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('بروز رسانی',['class'=>'btn btn-success col-md-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminCategoryController@destroy',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف مطلب',['class'=>'btn btn-danger col-md-3']) !!}
            </div>
            {!! Form::close()  !!}
        </div>
    </div>

@endsection

