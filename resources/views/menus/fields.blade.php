<!-- Name Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image', 'Изображение:') !!}
    <img src="" id="image-preview" style="max-width: 200px;">
    {!! Form::text('image', null, ['class' => 'form-control']) !!}

    <a onclick="filemanager.selectFile('image') " class="btn btn-primary">Выберите изображение</a>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Prise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prise', 'Цена:') !!}
    {!! Form::text('prise', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('menus.index') }}" class="btn btn-light">Отменить</a>
</div>
