<div class="table-responsive">
    <table class="table" id="productos-table">
        <thead>
            <tr>
                <th>Valor E</th>
        <th>Valor S</th>
        <th>Proveedores Id</th>
        <th>Estado Producto Id</th>
        <th>Detalle Recepcion Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->valor_E }}</td>
            <td>{{ $producto->valor_S }}</td>
            <td>{{ $producto->proveedores->nombre }}</td>
            <td>{{ $producto->estadoProducto->nombre }}</td>
            <td>{{ $producto->detalle_recepcion_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productos.show', [$producto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productos.edit', [$producto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
