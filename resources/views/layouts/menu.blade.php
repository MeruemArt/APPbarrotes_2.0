<li class="{{ Request::is('proveedores*') ? 'active' : '' }}">
    <a href="{{ route('proveedores.index') }}"><i class="fa fa-briefcase" style="font-size:20px;"></i><span>Proveedores</span></a>
</li>

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{{ route('clientes.index') }}"><i class="fa fa-edit" style="font-size:20px;"></i><span>Clientes</span></a>
</li>

<li class="{{ Request::is('detallePedidos*') ? 'active' : '' }}">
    <a href="{{ route('detallePedidos.index') }}"><i class="fa fa-book" style="font-size:20px;"></i><span>Detalle Pedidos</span></a>
</li>

<li class="{{ Request::is('confEmpresas*') ? 'active' : '' }}">
    <a href="{{ route('confEmpresas.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Conf Empresas</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{{ route('pedidos.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Pedidos</span></a>
</li>

<li class="{{ Request::is('devolucions*') ? 'active' : '' }}">
    <a href="{{ route('devolucions.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Devolucions</span></a>
</li>

<li class="{{ Request::is('detalleRecepcions*') ? 'active' : '' }}">
    <a href="{{ route('detalleRecepcions.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Detalle Recepcions</span></a>
</li>

<li class="{{ Request::is('estadoProductos*') ? 'active' : '' }}">
    <a href="{{ route('estadoProductos.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Estado Productos</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{{ route('productos.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('invProductos*') ? 'active' : '' }}">
    <a href="{{ route('invProductos.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Inv Productos</span></a>
</li>

<li class="{{ Request::is('productoDevolucions*') ? 'active' : '' }}">
    <a href="{{ route('productoDevolucions.index') }}"><i class="fa fa-edit"style="font-size:20px;"></i><span>Producto Devolucions</span></a>
</li>

