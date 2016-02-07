<div class="form-group">
{!! Form::label('sum', 'Введите сумму') !!}

{!! Form::text('sum', old('sum'), ['class'=>'form-control', 'placeholder'=>'Сумма в рублях', 'pattern' => '[0-9]+']) !!}
</div>
<input type="hidden" name="user_id" value="{{ $user->id }}">
<input type="hidden" name="page" value="{{ $page }}">
<div class="form-group">
    {!! Form::submit('Обновить баланс', ['class'=>'btn btn-success']) !!}
</div>