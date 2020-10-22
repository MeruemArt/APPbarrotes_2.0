<div class="table-responsive">
    <table class="table" id="invProductos-table">
        <thead>
            <tr>
                <th>Fecha</th>
        <th>Stock</th>
        <th>User Id</th>
        <th>Producto Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invProductos as $invProducto)
            <tr>
                <td>{{ $invProducto->fecha }}</td>
            <td>{{ $invProducto->stock }}</td>
            <td>{{ $invProducto->user_id }}</td>
            <td>{{ $invProducto->producto_id }}</td>
                <td>
                    {!! Form::open(['route' => ['invProductos.destroy', $invProducto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invProductos.show', [$invProducto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('invProductos.edit', [$invProducto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
