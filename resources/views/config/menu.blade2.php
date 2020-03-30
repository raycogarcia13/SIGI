<li class="header">Menú Configuraciones</li>
<li>
  <a href="{!! route('empresa') !!}"><i class="fa fa-home"></i> <span>Empresa</span></a>
</li>
<li>
  <a href="{!! route('usuarios.index') !!}"><i class="fa fa-user"></i> <span>Usuarios</span></a>
</li>
<li>
  <a href="{!! route('permisos.index') !!}"><i class="fa fa-list"></i> <span>Permisos</span></a>
</li>

<li class="treeview">
    <a href="#">
      <i class="fa fa-key"></i> <span>Seguridad</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{!! route('accesos') !!}"><i class="fa fa-circle-o"></i> Lista de accesos</a></li>
      <li><a href="{!! route('politicas') !!}"><i class="fa fa-circle-o"></i> Políticas de contraseñas</a></li>
      <li><a href="{!! route('sesion') !!}"><i class="fa fa-circle-o"></i> Inicio de sesión</a></li>
    </ul>
</li>