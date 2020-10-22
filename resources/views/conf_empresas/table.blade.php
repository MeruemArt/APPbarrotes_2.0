<div class="table-responsive">
    <table class="table" id="confEmpresas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Nit</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Logo</th>
        <th>N Factura</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($confEmpresas as $confEmpresa)
            <tr>
                <td>{{ $confEmpresa->nombre }}</td>
            <td>{{ $confEmpresa->nit }}</td>
            <td>{{ $confEmpresa->direccion }}</td>
            <td>{{ $confEmpresa->telefono }}</td>
            <td>{{ $confEmpresa->logo }}</td>
            <td>{{ $confEmpresa->n_factura }}</td>
                <td>
                    {!! Form::open(['route' => ['confEmpresas.destroy', $confEmpresa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('confEmpresas.show', [$confEmpresa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('confEmpresas.edit', [$confEmpresa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
