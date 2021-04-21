<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Названи:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Цвет подсветки:') !!}
    {!! Form::text('color', null, ['class' => 'form-control','id'=>'select-color']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('statuses.index') }}" class="btn btn-light">Отмена</a>
</div>
