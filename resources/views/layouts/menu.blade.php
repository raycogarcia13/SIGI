<li class="header">Opciones Generales</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
</li>



<li class="{{ Request::is('tecnicProcesos*') ? 'active' : '' }}">
    <a href="{!! route('tecnicProcesos.index') !!}"><i class="fa fa-edit"></i><span>Tecnic Procesos</span></a>
</li>

