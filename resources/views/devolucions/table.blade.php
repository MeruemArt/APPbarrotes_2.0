<div class="table-responsive">
    <table class="table" id="devolucions-table">
        <thead>
            <tr>
                <th>Codigo Fact</th>
        <th>Fecha</th>
        <th>Unidades</th>
        <th>Total</th>
        <th>Motivo</th>
        <th>User Id</th>
        <th>Pedido Id</th>
        <th>Proveedores Id</th>
        <th>Cliente Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($devolucions as $devolucion)
            <tr>
                <td>{{ $devolucion->codigo_fact }}</td>
            <td>{{ $devolucion->fecha }}</td>
            <td>{{ $devolucion->unidades }}</td>
            <td>{{ $devolucion->total }}</td>
            <td>{{ $devolucion->Motivo }}</td>
            <td>{{ $devolucion->user_id }}</td>
            <td>{{ $devolucion->pedido_id }}</td>
            <td>{{ $devolucion->proveedores->nombre }}</td>
            <td>{{ $devolucion->cliente->nombre }}</td>
                <td>
                    {!! Form::open(['route' => ['devolucions.destroy', $devolucion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('devolucions.show', [$devolucion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('devolucions.edit', [$devolucion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
