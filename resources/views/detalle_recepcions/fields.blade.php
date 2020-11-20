<!-- Pedido Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pedido_id', 'Pedido Id:') !!}
    {!! Form::select('pedido_id', $pedido, null, ['class' => 'form-control']) !!}
</div>

<!-- Detalle Pedido Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detalle_pedido_id', 'Detalle Pedido Id:') !!}
    {!! Form::select('detalle_pedido_id', $detalle_pedido, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detalleRecepcions.index') }}" class="btn btn-default">Cancel</a>
</div>
