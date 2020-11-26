<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $producto->id }}</p>
</div>

<!-- nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'nombre:') !!}
    <p>{{ $producto->nombre }}</p>
</div>

<!-- Valor E Field -->
<div class="form-group">
    {!! Form::label('valor_E', 'Valor E:') !!}
    <p>{{ $producto->valor_E }}</p>
</div>

<!-- Valor S Field -->
<div class="form-group">
    {!! Form::label('valor_S', 'Valor S:') !!}
    <p>{{ $producto->valor_S }}</p>
</div>

<!-- Proveedores Id Field -->
<div class="form-group">
    {!! Form::label('proveedores_id', 'Proveedores Id:') !!}
    <p>{{ $producto->proveedores_id }}</p>
</div>

<!-- Estado Producto Id Field -->
<div class="form-group">
    {!! Form::label('estado_producto_id', 'Estado Producto Id:') !!}
    <p>{{ $producto->estado_producto_id }}</p>
</div>

<!-- Detalle Recepcion Id Field -->
<div class="form-group">
    {!! Form::label('detalle_recepcion_id', 'Detalle Recepcion Id:') !!}
    <p>{{ $producto->detalle_recepcion_id }}</p>
</div>

