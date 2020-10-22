<div class="table-responsive">
    <table class="table" id="productoDevolucions-table">
        <thead>
            <tr>
                <th>Fecha</th>
        <th>Cliente Id</th>
        <th>Producto Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productoDevolucions as $productoDevolucion)
            <tr>
                <td>{{ $productoDevolucion->fecha }}</td>
            <td>{{ $productoDevolucion->cliente_id }}</td>
            <td>{{ $productoDevolucion->producto_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productoDevolucions.destroy', $productoDevolucion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productoDevolucions.show', [$productoDevolucion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productoDevolucions.edit', [$productoDevolucion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
