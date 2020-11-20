<li class="{{ Request::is('proveedores*') ? 'active' : '' }}">
    <a href="{{ route('proveedores.index') }}"><i class="fa fa-truck" style="font-size:20px;"></i><span>&nbsp;&nbsp;Proveedores</span></a>
</li>

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{{ route('clientes.index') }}"><i class="fa fa-briefcase" style="font-size:20px;"></i><span>&nbsp;&nbsp;Clientes</span></a>
</li>

<li class="{{ Request::is('detallePedidos*') ? 'active' : '' }}">
    <a href="{{ route('detallePedidos.index') }}"><i class="fa fa-book" style="font-size:20px;"></i><span>&nbsp;&nbsp;Detalle Pedidos</span></a>
</li>

<li class="{{ Request::is('confEmpresas*') ? 'active' : '' }}">
    <a href="{{ route('confEmpresas.index') }}"><i class="fa fa-cogs"style="font-size:20px;"></i><span>&nbsp;&nbsp;Conf Empresas</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{{ route('pedidos.index') }}"><i class="fa fa-cart-plus"style="font-size:20px;"></i><span>&nbsp;&nbsp;Pedidos</span></a>
</li>

<li class="{{ Request::is('devolucions*') ? 'active' : '' }}">
    <a href="{{ route('devolucions.index') }}"><i class="fa fa-cart-arrow-down"style="font-size:20px;"></i><span>&nbsp;&nbsp;Devoluciones</span></a>
</li>

<li class="{{ Request::is('detalleRecepcions*') ? 'active' : '' }}">
    <a href="{{ route('detalleRecepcions.index') }}"><i class="fa fa-exclamation-circle"style="font-size:20px;"></i><span>&nbsp;&nbsp;Detalle Recepcions</span></a>
</li>

<li class="{{ Request::is('estadoProductos*') ? 'active' : '' }}">
    <a href="{{ route('estadoProductos.index') }}"><i class="fa fa-info-circle"style="font-size:20px;"></i><span>&nbsp;&nbsp;Estado Productos</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{{ route('productos.index') }}"><i class="fa fa-cube"style="font-size:20px;"></i><span>&nbsp;&nbsp;Productos</span></a>
</li>

<li class="{{ Request::is('invProductos*') ? 'active' : '' }}">
    <a href="{{ route('invProductos.index') }}"><i class="fa fa-cubes"style="font-size:20px;"></i><span>&nbsp;&nbsp;Inv Productos</span></a>
</li>

<li class="{{ Request::is('productoDevolucions*') ? 'active' : '' }}">
    <a href="{{ route('productoDevolucions.index') }}"><i class="fa fa-reply"style="font-size:20px;"></i><span>&nbsp;&nbsp;Producto Devolucions</span></a>
</li>

