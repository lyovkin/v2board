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
                    {!! Form::text($attachment['id'], $attachment['comment'], ["class"=>"form-control", "required",
                        "id"=> $attachment['id'], "placeholder"=>"Комментарий к фотографии"]) !!}

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
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>