@extends('m_layouts.app')

@section('content')
        {!! Form::open(['class'=>'form-horizontal']) !!}
        <div class="row" style='width:90%;'>
        <div class='form-group'>
                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
        </div>
        <div class='form-group'>
            {!! Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Text']) !!}		
        </div>
        <div class='form-group'>
            {!! Form::select('category', $categories, ['class'=>'form-control']) !!}
                
        </div>
        <div class='form-group'>
            {!! Form::submit('Create', ['class'=>'buton b_asset buton-2 buton-mini']) !!}    
        </div>
        </div>
        {!! Form::close() !!}

@stop
