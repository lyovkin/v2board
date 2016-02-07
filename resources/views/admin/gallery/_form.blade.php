<div class="form-group">
    {!! Form::label('title', "Заголовок", ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ["class"=>"form-control",
            "placeholder"=>"Заголовок",'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('article', "Содержание", ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('article', null, ["class"=>"form-control",
        "placeholder"=>"Содержание", "id" => "editor","rows" => 25]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Meta description', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('description', null, ["class"=>"form-control",
        "placeholder"=>'Meta description', "rows" => 5]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Meta tags', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('tags', null, ["class"=>"form-control",
            "placeholder"=>'Meta tags', 'data-role' => "tagsinput"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('slug', null, ["class"=>"form-control",
            "placeholder"=>'Slug','required', 'pattern' => '^[\w\-]+$' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('columns', 'Колонки', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("columns", [1=>1, 2=>2, 3=>3]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-2">
        <div id="drop">
            <span id="instruction">Перетащите файлы сюда или</span>

            <a id='selectFiles' onclick="upload('/admin/gallery/upload')">Выберите</a>
            <input id="upload" type="file" name="upl" multiple />
        </div>

        <ul id='files'>
            @if(isset($attachments) && $attachments->count() > 0)
                @foreach($attachments->toArray() as $attachment)
                <li>
                    <img src="{{ $attachment['url'] }}" class="preview">
                    <span class="del-group">
                        <a class="del-attachment" href="#" data-id="{{ $attachment['id'] }}">Удалить</a>
                        <img src="/pub_admin/img/preloader.gif" alt="preloader"/>
                    </span>
                    <div>
                        {!! Form::text($attachment['id'], $attachment['comment'], ["class"=>"form-control", "required",
                            "id"=> $attachment['id'], "placeholder"=>"Комментарий к фотографии"]) !!}

                        {!! Form::text('link'.$attachment['id'], $attachment['link'], ["class"=>"form-control",
                                                "id"=> 'link'.$attachment['id'], "placeholder"=>"Ссылка"]) !!}
                    </div>
                </li>
                @endforeach
            @endif
           <script id="entry-template" type="text/x-handlebars-template">
              <li>
                <img src="@{{url}}" class="preview">
                <span class="del-group">
                    <a class="del-attachment" href="#" data-id="@{{ id }}">Удалить</a>
                    <img src="/pub_admin/img/preloader.gif" alt="preloader"/>
                </span>
                <div>
                    <input required type="text" name="@{{ id }}" id="@{{ id }}" class="form-control" placeholder="Комментарий к фотографии">
                    <input type="text" name="link@{{ id }}" id="link@{{ id }}" class="form-control" placeholder="Ссылка">
                </div>
              </li>
          </script>
        </ul>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>