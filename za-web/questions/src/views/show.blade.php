@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Вопросы
@stop
@section('js')

@stop
@section('content')
    <div class="col-md-7">
        <div class="block-heading">
            <a href="{{ url('questions/create')}}" class="btn btn-sm btn-primary pull-right">Задать вопрос <i
                        class="fa fa-long-arrow-right"></i></a>
            <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Вопросы</h4>
        </div>
        <div class="agents-listing">
            <div class="agent-info">
                <div class="counts"><span>Ответов</span><strong>{{ count($data->comments) }}</strong></div>
                <h3><a href="">{{ $data->title }}</a></h3>
                <p>{{ $data->text }}</p>
                @if($data->questions_attachment)
                    <img src="{{ $data->questions_attachment['url'] }}" width="50%">
                @endif
            </div>

        </div>
        @if($data->comments)
            <section class="post-comments" id="comments">
                <h3><i class="fa fa-comment"></i> Ответы ({{ count($data->comments) }} )</h3>
                <ol class="comments">
                    @foreach($data->comments as $comment)
                        <li id='comment{{$comment['id']}}'>
                            <div class="post-comment-block">
                                @if($comment->user->profile->avatar)

                                    <div class="img-thumbnail">
                                        {!! HTML::image(url('img', ['profile', $comment->user->profile->avatar->name]).'?w=50&h=50&fit=crop', null) !!}
                                    </div>
                                @endif
                                <h5><a href='{{ url('profile', $comment->user->user_name ) }}'>{{ $comment->user->user_name }}</a></h5>
                                <span class="meta-data">{{ $comment->created_at }}</span>
                                <p class='row-content'> {{ $comment->text }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </section>
        @endif
        @if(Auth::user())
            <section class="post-comment-form">
                <h3><i class="fa fa-share"></i> Оставьте комментарий</h3>
                {!! Form::open(['url'=>'answers']) !!}
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('text', null, ['class'=>'form-control input-lg', 'cols'=>8, 'rows'=>4, 'placeholder'=>'Текст', 'required'=>'']) !!}
                            {!! Form::hidden('question_id', $data->id) !!}
                            {!! Form::hidden('user_id', $data->user->id) !!}
                            {!! Form::hidden('type', 2) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::submit( 'Отправить', ['class'=>'btn btn-primary btn-lg']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </section>
        @endif
    </div>
@stop
