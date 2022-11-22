<script type="text/javascript">
    $('.btn-open').click(function() {
        $('.form-reply').css('display', 'none')

        var service = this.id
        var service_id = '#f-' + service
        $(service_id).show('slow')
    })
</script>





@foreach ($comments as $comment)
    <div class="media mb-4 ml-4">
        <img class="d-flex mr-3 ml-4 rounded-circle" src="https://via.placeholder.com/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">مهمان</h5>
            {{ $comment->description }}
            <div class="media mt-2 mb-2 row">
                <div class="col-md-12 ">
                    <button href="#" id="div-comment-{{ $comment->id }}" class="btn btn-warning btn-open">
                        پاسخ</button>
                </div>
                <div class="form-reply col-md-12" id="f-div-comment-{{ $comment->id }}" style="display:none">
                    {!! Form::open(['method' => 'POST', 'route' => ['frontend.comments.reply']]) !!}
                    <div class="form-group">
                        {!! Form::hidden('parent_id', $comment->id) !!}
                        {!! Form::hidden('post_id', $post->id) !!}

                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('ثبت پاسخ', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

                @include('partials.comments', ['comments' => $comment->replies])
            </div>
        </div>
    </div>
@endforeach
