@section('sidebar')
    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">جستجو</h5>
        <div class="card-body">
            {!! Form::open(['method' => 'GET' , 'route' =>'f.posts.search'])!!}
            <div class="form-group">
                {!!Form::text('title',null,['class'=>'form-control']) !!}
                <span class="input-group-btn">
                    {!! Form::submit('جستجو',['class'=>'btn btn-secondary']) !!}
                </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ $category->title }}
                    </a>
                </li>
            @endforeach
        </div>
    </div>


    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap
            4 card containers!
        </div>
    </div>
@endsection
