<div class="table-responsive">
    <table class="table" id="detallePedidos-table">
        <thead>
            <tr>
                <th>Codigo Fact</th>
        <th>Fecha</th>
        <th>Unidades</th>
        <th>Valor</th>
        <th>Telefono</th>
        <th>User Id</th>
        <th>Proveedor Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detallePedidos as $detallePedido)
            <tr>
                <td>{{ $detallePedido->codigo_fact }}</td>
            <td>{{ $detallePedido->fecha }}</td>
            <td>{{ $detallePedido->unidades }}</td>
            <td>{{ $detallePedido->valor }}</td>
            <td>{{ $detallePedido->telefono }}</td>
            <td>{{ $detallePedido->user_id }}</td>
            <td>{{ $detallePedido->proveedores->nombre }}</td>
                <td>
                    {!! Form::open(['route' => ['detallePedidos.destroy', $detallePedido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detallePedidos.show', [$detallePedido->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detallePedidos.edit', [$detallePedido->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
