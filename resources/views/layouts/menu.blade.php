<li class="{{ Request::is('proveedores*') ? 'active' : '' }}">
    <a href="{{ route('proveedores.index') }}"><i class="fa fa-edit"></i><span>Proveedores</span></a>
</li>

<li class="{{ Request::is('detallePedidos*') ? 'active' : '' }}">
    <a href="{{ route('detallePedidos.index') }}"><i class="fa fa-edit"></i><span>Detalle Pedidos</span></a>
</li>

