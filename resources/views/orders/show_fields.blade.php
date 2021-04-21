<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Телефон:') !!}
    <p>{{ $order->telephone }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Адресс:') !!}
    <p>{{ $order->address }}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Статус заказа:') !!}
    <p>{{ $order->status_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Добавлен:') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Обновлен:') !!}
    <p>{{ $order->updated_at }}</p>
</div>

