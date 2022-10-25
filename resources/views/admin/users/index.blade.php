@extends('admin.layouts.master')

@section('content')

        <table class="table table-hover">
            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>سمت</th>
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
                    <td>{{verta($user->created_at)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
