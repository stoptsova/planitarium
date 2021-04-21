<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    <p>{{ $menu->name }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Изображение:') !!}
    <p>{{ $menu->image }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    <p>{{ $menu->description }}</p>
</div>

<!-- Prise Field -->
<div class="form-group">
    {!! Form::label('prise', 'Цена:') !!}
    <p>{{ $menu->prise }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Добавлен:') !!}
    <p>{{ $menu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Обновлен:') !!}
    <p>{{ $menu->updated_at }}</p>
</div>

