@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-primary">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{ $postsCount }}</h4>
                    <p>مطالب</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart1" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-info">
                <div class="card-block p-b-0">
                    <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                        <i class="icon-location-pin"></i>
                    </button>
                    <h4 class="m-b-0">{{ $categoriesCount }}</h4>
                    <p>دسته بندی ها</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart2" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-warning">
                <div class="card-block p-b-0">

                    <h4 class="m-b-0">{{ $photosCount }}</h4>
                    <p>تصاویر</p>
                </div>
                <div class="chart-wrapper" style="height:70px;">
                    <canvas id="card-chart3" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-danger">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{ $usersCount }}</h4>
                    <p>کاربران</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart4" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

    </div>
    <div class="row">
        <h3>آخرین مطالب</h3>
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>دسترسی بندی</th>
                        <th>تاریخ ایجاد</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('posts.edit', $post) }}">{{ $post->title }}</a></td>
                            <td>{{$post->category->title}}</td>
                            <td>{{ verta($post->created_at) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><img src="{{$user->photo?$user->photo->path : "http://www.placehold.it/400"}}" alt=""
                                 class="img-fluid img-circle" width="65"></td>
                        <td><a href="{{route('users.edit',$user)}}">{{$user->name}}</a></td>
                        <td>{{verta($user->created_at)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
