<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $detalleRecepcion->id }}</p>
</div>

<!-- Pedido Id Field -->
<div class="form-group">
    {!! Form::label('pedido_id', 'Pedido Id:') !!}
    <p>{{ $detalleRecepcion->pedido_id }}</p>
</div>

<!-- Detalle Pedido Id Field -->
<div class="form-group">
    {!! Form::label('detalle_pedido_id', 'Detalle Pedido Id:') !!}
    <p>{{ $detalleRecepcion->detalle_pedido_id }}</p>
</div>

