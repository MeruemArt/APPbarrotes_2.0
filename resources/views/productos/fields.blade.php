<!-- Valor E Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_E', 'Valor E:') !!}
    {!! Form::text('valor_E', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor S Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_S', 'Valor S:') !!}
    {!! Form::text('valor_S', null, ['class' => 'form-control']) !!}
</div>

<!-- Proveedores Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proveedores_id', 'Proveedores Id:') !!}
    {!! Form::text('proveedores_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_producto_id', 'Estado Producto Id:') !!}
    {!! Form::text('estado_producto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Detalle Recepcion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detalle_recepcion_id', 'Detalle Recepcion Id:') !!}
    {!! Form::text('detalle_recepcion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productos.index') }}" class="btn btn-default">Cancel</a>
</div>
