<!-- time -->
<div class="form-group">
    {!! Form::label('paid_at', 'Активен до', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('paid_at', old('paid_at'), ["class"=>"form-control","id"=>"datepicker",
        'required' => 'required', "placeholder"=>"Показывать до"]) !!}
    </div>
</div>