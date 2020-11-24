<div class="table-responsive">
    <table class="table" id="proveedores-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Nit</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedores)
            <tr>
                <td>{{ $proveedores->nombre }}</td>
            <td>{{ $proveedores->nit }}</td>
            <td>{{ $proveedores->direccion }}</td>
            <td>{{ $proveedores->telefono }}</td>
            <td>{{  $proveedores->user->name  }}</td>
                <td>
                    {!! Form::open(['route' => ['proveedores.destroy', $proveedores->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proveedores.show', [$proveedores->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('proveedores.edit', [$proveedores->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
