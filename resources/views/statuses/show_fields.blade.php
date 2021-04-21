<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Статус заказа:') !!}
    <p>{{ $status->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('color', 'Цвет подсветки:') !!}
    <p style="background-color: {{$status->color}}">{{ $status->color }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Создан:') !!}
    <p>{{ $status->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Обновлен:') !!}
    <p>{{ $status->updated_at }}</p>
</div>

