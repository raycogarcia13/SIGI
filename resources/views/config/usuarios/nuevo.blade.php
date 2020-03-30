<form action="" method="post" novalidate id="crearDataForm">
    @csrf
    <div class="col-md-1">
        <a href="#" title="Nuevo Invitado" id="selec_invitado" class="float-left"><img src="{{asset('images/iconos/config/SVG___CUPET_Btn_Add-Guest-Off.svg')}}" alt="" width="30" height="30"></a>
        <a href="#" title="Nuevo Trabajador" id="selec_trabajador" class="float-left"><img src="{{asset('images/iconos/config/SVG___CUPET_Btn_Add-User-Off.svg')}}" alt="" width="30" height="30"></a>
    </div>
    <div class="row" style="margin: 0px;">
        <div class="col-md field">
            <input type="text" required data-validate-length-range="3" name="username" style="margin-top: 2px;height: 27px;" placeholder="Usuario"  id="username">
        </div> 
        <div class="col-md-4" style="display:inline-block;vertical-align: middle;">
            <a href="#" id="selecciona_persona" style="text-align: center;display: block;">Selecciona una persona</a>
            <input type="hidden" id="persona_id" name="persona_id">
            <input type="hidden" id="persona_tipo" value="trabajador" name="persona_tipo">
            <div id="lista_trabajadores_invitados">
                <input type="text" id="filtro_t_i" style="padding: 3px;width: 100%;" placeholder="Filtrar Personas" autocomplete="false">
                <div style="cursor: pointer;width:27px;height:27px;top: 35px;" id="limpiarFiltro">x</div>
                <div class="list"></div>
            </div>
        </div>  
        <div class="col-md field">
            <input type="password" autocomplete pass="true" required name="password" style="margin-top: 2px;height: 27px;" placeholder="Contraseña"  id="password">
        </div> 
        <div class="col-md field">
            <input type="password" autocomplete required data-validate-linked="password" name="password2" style="margin-top: 2px;height: 27px;" placeholder="Confirmar contraseña"  id="pass2">
        </div> 
        <div class="col-md-2">
             <a href="#" id="cancelarCrearForm" class="cancelar-30x30"></a>
             <a href="#" id="crearForm" class="aceptar-30x30"></a>
        </div>
    </div>
</form>