@extends('template.base')

@section('title') Inicio | SIGI @stop

@section('content')
{{-- Login form --}}
<div id="login-modal" class="modal fade modal-login">
    <div class="modal-dialog">
        <form method="post" action="{{ url('/login') }}" id="login-form">
            <div class="modal-content bg-green @if ($errors->has('password')||$errors->has('username')) login-error1 @endif">
                <div class="modal-body">
                    <div class="login-box">
                        <!-- /.login-logo -->
                        <div class="login-box-body">

                            @csrf

                            <input type="hidden" id="ruta" name="ruta" value="{{old('ruta','config')}}" />

                            <div class="form-group row">
                                <label class="col-sm-1">
                                    <img src="{{asset('images/iconos/generales/S_CUPET_Btn_User_03.svg')}}" id="usernameIcon" style="margin-top: -2px;" alt="" width="30">
                                </label>
                                <div class="col-sm-10" style="padding-right: 0px;margin-right: 0px;padding-left: 0px;margin-left: 2px;">
                                    <input type="text" class="form-control" id="username" value="{{old('username')}}" name="username" placeholder="Usuario">
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom: 0px;">
                                <label class="col-sm-1" style="padding-bottom:0px;margin-bottom:0px;">
                                    <img src="{{asset('images/iconos/generales/S_CUPET_Btn_Passw_03.svg')}}" id="passwordKeyIcon"  style="margin-top: -2px;" alt="" width="30">
                                </label>
                                <div class="col-sm-10" style="padding-bottom:0px;margin-bottom:0px;padding-right: 0px;margin-right: 0px;padding-left: 0px;margin-left: 2px;">
                                    <input type="password" id="password_key" class="form-control" placeholder="Contraseña" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                    <div class="text-light" style="height: 23px;"> 
                                    @if ($errors->has('password')||$errors->has('username'))Credenciales incorrectas @endif
                                    @if(session('status'))
                                        <?php $autent=true;?>
                                        <center>{{session('status')}}</center>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 0px;padding-bottom: 0px;">
                                <label class="col-sm-1">
                                    
                                </label>
                                <div class="col-sm-10" style="padding-right: 0px;">
                                    <button type="button" class="btn-cancel float-sm-right" data-dismiss="modal" style="margin-right: -10px;"></button>
                                    <button type="submit" form="login-form" class="btn-accept float-sm-right" style="margin-right: 0px;"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
    {{-- End Login form --}}

    {{-- Acerca de modal --}}
    {{-- End Acerca de modal --}}

    {{-- Desarrollado por Modal --}}
    {{-- End Desarrollado por Modal --}}

    <div class="position-ref full-height">
        <div class="content">
            <div class="central-links-container">
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="operac" data-icon="S_CUPET_Btn_Operaciones-Ok">
                        <div class="text">operaciones</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Operaciones-Ok_StandBy.svg') }}" src-default="S_CUPET_Btn_Operaciones-Ok_StandBy.svg" src-hover="S_CUPET_Btn_Operaciones-Ok_On.svg" alt="Operaciones" width="100%">
                    </a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="mecani" data-icon="S_CUPET_Btn_Mecanizacion-Ok">
                        <div class="text">mecanización</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Mecanizacion-Ok_StandBy.svg') }}" src-default="S_CUPET_Btn_Mecanizacion-Ok_StandBy.svg" src-hover="S_CUPET_Btn_Mecanizacion-Ok_On.svg" alt="ATM" width="100%">
                    </a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="comerc" data-icon="S_CUPET_Btn_Comercial-Ok">
                        <div class="text">comercial</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Comercial-Ok_StandBy.svg') }}"  src-default="S_CUPET_Btn_Comercial-Ok_StandBy.svg" src-hover="S_CUPET_Btn_Comercial-Ok_On.svg" alt="ATM" width="100%">
                    </a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="asegur" data-icon="S_CUPET_Btn_Aseguramiento-Ok">
                        <div class="text">aseguramiento</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Aseguramiento-Ok_StandBy.svg') }}"  src-default="S_CUPET_Btn_Aseguramiento-Ok_StandBy.svg" src-hover="S_CUPET_Btn_Aseguramiento-Ok_On.svg" alt="ATM" width="100%">
                    </a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="econom" data-icon="S_CUPET_Btn_Economía-Ok">
                        <div class="text">contabilidad</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Economía-Ok_StandBy.svg') }}"  src-default="S_CUPET_Btn_Economía-Ok_StandBy.svg" src-hover="S_CUPET_Btn_Economía-Ok_On.svg" alt="ATM" width="100%"></a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="caphum" data-icon="S_CUPET_Btn_RRHH-OK">
                        <div class="text">capital humano</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_RRHH-OK_StandBy.svg') }}"  src-default="S_CUPET_Btn_RRHH-OK_StandBy.svg" src-hover="S_CUPET_Btn_RRHH-OK_On.svg" alt="ATM" width="100%"></a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="tecnic" data-icon="S_CUPET_Btn_Tecnica-OK">
                        <div class="text">técnica</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Tecnica-OK_StandBy.svg') }}"  src-default="S_CUPET_Btn_Tecnica-OK_StandBy.svg" src-hover="S_CUPET_Btn_Tecnica-OK_On.svg" alt="ATM" width="100%"></a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="contra" data-icon="S_CUPET_Btn_Contratacion-OK">
                        <div class="text">contratación</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Contratacion-OK_StandBy.svg') }}"  src-default="S_CUPET_Btn_Contratacion-OK_StandBy.svg" src-hover="S_CUPET_Btn_Contratacion-OK_On.svg" alt="ATM" width="100%"></a>
                </div>
                <div class="central-links-out">
                    <a href="#" class="central-links" ruta="contaud" data-icon="S_CUPET_Btn_Auditoria-OK">
                        <div class="text">auditoría</div>
                        <img src="{{ asset('images/iconos/generales/S_CUPET_Btn_Auditoria-OK_StandBy.svg') }}" src-default="S_CUPET_Btn_Auditoria-OK_StandBy.svg" src-hover="S_CUPET_Btn_Auditoria-OK_On.svg" alt="ATM" width="100%"></a>
                </div>
            </div>
            <div style="width: 98px;margin-left: 43%;margin-top: 21px;">
                <a href="{{url('empresa')}}" ruta="config" class="link-config">
                    <img src="{{asset('images/iconos/generales/S_CUPET_Btn_ConfigIni_Ok_On.svg')}}" alt="" src-default="S_CUPET_Btn_ConfigIni_Ok_On.svg" src-hover="S_CUPET_Btn_ConfigIni_Off.svg">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    //Change status and click show modal login
            var autenticate='{!!Auth::user()!!}';
            $('#config').click(function(){
                $("#id_modulo_login").html('Configuraciones');
                $('#ruta').val($(this).attr('ruta'));
                if(!autenticate)
                {
                    $('#login-form').submit();
                }
                $("#login-modal").modal('show');
            })
            $(".central-links,.link-config").unbind().on('click',function(){
                var name = $(this).children('div.text').text();
                $("#id_modulo_login").html(name);
                $('#ruta').val($(this).attr('ruta'));
                if(autenticate!='')
                {
                    $('#login-form').submit();
                }
                $("#login-modal").modal('show');
                return false;
            }).mouseenter(function(){
                var child_img = $(this).children('img');
                child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-hover'));
            }).mouseleave(function(){
                var child_img = $(this).children('img');
                child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-default'));
            });

            @if ($errors->has('password')||$errors->has('username')||isset($autent))
                $('#login-modal').modal('show');
            @endif

    </script>

@endsection
