@extends('m_layouts.app')
@section('title')
    Создать объявление
@stop

@section('content')
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Создать новое объявление</h3>
        </div>
        <div class="panel-body">
            @include('partials.errors.basic')

            {!! Form::open(['url' => 'ads/flush']) !!}
            <div class="form-group">
                    {!! Form::select('type_id', $ad_types, null, ['class'=> 'form-control'] ) !!}
            </div>
            <div class="form-group">
                    {!! Form::select('category_id', $categories, null, ['class'=> 'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Телефон']) !!}
            </div>
            <div class="form-group">
                    {!! Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Текст']) !!}
            </div>
            <div class="form-group">
                    {!! Form::text('price', old('price'), ['class'=>'form-control', 'placeholder'=>'Цена']) !!}
            </div>
            <div class="form-group">
                    <div id="drop">
                        <span id="instruction">Перетащите файлы сюда или</span>

                        <a id='selectFiles' onclick="upload('/ads/upload')">Выберите</a>
                        <input id="upload" type="file" name="upl" multiple />
                    </div>
 
                    <ul id='files'>
                        @if($attachments->count() > 0)
                            @foreach($attachments->toArray() as $attachment)
                            <li>
                                
                                <img src="{{ $attachment['url'] }}" class="preview">
                                <input required type="text" value="{{ old($attachment['id']) }}" name="{{$attachment['id']}}" id="{{$attachment['id']}}"
                                       class="form-control" placeholder="Комментарий к фотографии">

                            </li>
                            @endforeach
                        @endif
                       <script id="entry-template" type="text/x-handlebars-template">
                          <li>
                            <img src="@{{url}}" class="preview">
                            <div>
                              <input required type="text" name="@{{ id }}" id="@{{ id }}" class="form-control" placeholder="Комментарий к фотографии">
                            </div>    
                          </li>
                      </script>
                    </ul>
            </div>
            {!! Form::hidden('hash') !!}
            
            <div class="form-group">
                {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
            </div>
                
            </div>
            {!! Form::close() !!}
            
        </div>
</div>
    @stop
