
<li class="nav-item">
    <a href="{{ route('capacitacionEstados.index') }}" class="nav-link {{ Request::is('capacitacionEstados*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Estados</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionTipos.index') }}" class="nav-link {{ Request::is('capacitacionTipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Tipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionMarcas.index') }}" class="nav-link {{ Request::is('capacitacionMarcas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Marcas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionModelos.index') }}" class="nav-link {{ Request::is('capacitacionModelos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Modelos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionClientes.index') }}" class="nav-link {{ Request::is('capacitacionClientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionEquipos.index') }}" class="nav-link {{ Request::is('capacitacionEquipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Equipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('capacitacionServicios.index') }}" class="nav-link {{ Request::is('capacitacionServicios*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Capacitacion Servicios</p>
    </a>
</li>
