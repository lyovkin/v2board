@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Создать вопрос
@stop

@section('content')
<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Создать новый вопрос</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'questions/flush']) !!}
            {{--<div class="form-group">
                    {!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Заголовок', 'required']) !!}
            </div>--}}
            <div class="form-group">
                    {!! Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Текст', 'required']) !!}
            </div>

            <div class="form-group">
                    <div id="drop">

                        <a id='selectFiles' onclick="upload('/questions/upload')">Выберите каритнку</a>
                        <input id="upload" type="file" name="upl" />
                    </div>
 
                    <ul id='files'>
                       <script id="entry-template" type="text/x-handlebars-template">
                          <li>
                              <img src="@{{url}}" class="preview">
                          </li>
                      </script>
                    </ul>
            </div>
            {!! Form::hidden('attachment_hash') !!}
            
            <div class="form-group">
                {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
            </div>
                
            </div>
            {!! Form::close() !!}
            
        </div>
</div>
    @stop
