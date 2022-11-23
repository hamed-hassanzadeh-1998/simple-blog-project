@php use Illuminate\Support\Facades\Session; @endphp
use \Illuminate\Support\Facades\Session:class;
@extends('admin.layouts.master')

@section('scripts')

<script>
    $(document).ready(function(){
      $('#options').click(function(){
        if(this.checked){
          $('.checkBox').each(function(){
            this.checked = true;
          })
        }else{
          $('.checkBox').each(function(){
            this.checked = false;
          })
        }

      })
    })
</script>
@endsection

@section('content')




    @if (Session::has('delete_photo'))
        <div class="alert alert-danger">
            <div>{{ session('delete_photo') }}</div>
        </div>
    @endif
    @if (Session::has('delete_photos'))
        <div class="alert alert-danger">
            <div>{{ session('delete_photos') }}</div>
        </div>
    @endif



    <h3>لیست فایل ها</h3>

    <form action="/admin/delete/media" method="POST" class="form-inline">
        @csrf
        {{ method_field('delete') }}
        <div class="form-group">
            <select name="checkBoxArray" class="form-control" id="">
                <option value="delete">حذف دسته جمعی</option>
            </select>
            <input name="submit" type="submit" class="btn btn-primary" value="اعمال">
        </div>


        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th><input type="checkBox" id="options"></th>
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
                        <td><input type="checkBox" class="checkBox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                        <td>{{ $photo->id }}</td>
                        <td><img src="{{ $photo->path }}" class="img-thumbnail" width='50' alt=""></td>
                        <td>{{ $photo->user->name }}</td>
                        <td>{{ verta($photo->created_at) }}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminPhotoController@destroy', $photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('حذف ', ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    <div class="col-md-12 text-center">
        {{ $photos->links() }}
    </div>
@endsection
