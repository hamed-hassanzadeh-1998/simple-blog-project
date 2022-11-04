 @extends('admin.layouts.master')

@section('content')
    <h3>لیست کاربران</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>سمت</th>
            <th>وضعیت کاربر</th>
            <th>تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <ul style="list-style: none">
                        @foreach($user->roles as $role)
                            <li>
                                {{$role->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                @if($user->status===0)
                    <td>
                        <span class="tag tag-pill tag-danger">غیرفعال</span>
                    </td>
                @else
                    <td>
                        <span class="tag tag-pill tag-success"> فعال</span>
                    </td>
                @endif
                <td>{{verta($user->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
