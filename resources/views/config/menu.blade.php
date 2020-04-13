<a href="{!! route('empresa') !!}" class="default-link-sidebar"><div class="mark-alt"></div>Empresa</a>
<a href="{!! route('usuarios.index') !!}" class="default-link-sidebar"><div class="mark-alt"></div>Usuarios</a>
<a href="{!! route('permisos.index') !!}" class="default-link-sidebar"><div class="mark-alt"></div>Permisos</a>

<a href="#" class="default-link-sidebar"><div class="mark-alt"></div>Seguridad</a>
<a href="{!! route('accesos') !!}" class="sub-link-sidebar"><div class="mark"></div>Listas de acceso</a>
<a href="{!! route('politicas') !!}" class="sub-link-sidebar"><div class="mark"></div>Políticas de seguridad</a>

<a href="#" class="default-link-sidebar" data-toggle="modal" data-target="#desarrollado-por"><div class="mark-alt"></div>Desarrollado por</a>
<a href="#" class="default-link-sidebar" data-toggle="modal" data-target="#acerca-de"><div class="mark-alt"></div>Acerca de</a>

<a href="{!! url('/logout') !!}" class="default-link-sidebar" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><div class="mark-alt"></div>Salir</a>