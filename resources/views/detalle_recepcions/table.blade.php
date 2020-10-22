<div class="table-responsive">
    <table class="table" id="detalleRecepcions-table">
        <thead>
            <tr>
                <th>Pedido Id</th>
        <th>Detalle Pedido Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detalleRecepcions as $detalleRecepcion)
            <tr>
                <td>{{ $detalleRecepcion->pedido_id }}</td>
            <td>{{ $detalleRecepcion->detalle_pedido_id }}</td>
                <td>
                    {!! Form::open(['route' => ['detalleRecepcions.destroy', $detalleRecepcion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detalleRecepcions.show', [$detalleRecepcion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detalleRecepcions.edit', [$detalleRecepcion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
