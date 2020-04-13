@extends('template.base')

@section('title') Config | Accesos @stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;top:5px">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f"><div class="mark"></div>Políticas de seguridad</a>
    </div>
@stop


@section('content')
@include('modal.global')
<div class="container" style="margin-top: 2%;">
    <!-- Main content -->
            <form method="POST" action="{{ route('politicas.edit') }}">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                    <div class="col-md-6 pull-left">
                        <h5>Inicio de sesión</h5>
                        <hr>
                        <div class="form-group {{ $errors->has('intentos_fallidos') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='intentos' class='col-md-6'>Máxima cantidad de intentos</label>
                            <div class="col-md-12">
                                <input type="number" name="intentos_fallidos" value="{{$politicas->intentos_fallidos}}" class='form-control'>
                                @if ($errors->has('intentos_fallidos'))<span class="help-block"><strong>{{ $errors->first('intentos_fallidos') }}</strong></span>@endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tiempo_validez') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='tiempo' class='col-md-6'>Tiempo de validez (dias)</label>
                            <div class="col-md-12">
                                <input type="number" name="tiempo_validez" value="{{$politicas->tiempo_validez}}" class='form-control'>
                                @if ($errors->has('tiempo_validez'))<span class="help-block"><strong>{{ $errors->first('tiempo_validez') }}</strong></span>@endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('notif_vencimiento') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='vencimiento' class='col-md-6'>Notificar vencimiento (dias antes)</label>
                            <div class="col-md-12">
                                <input type="number" name="notif_vencimiento" value="{{$politicas->notif_vencimiento}}" class='form-control'>
                                @if ($errors->has('notif_vencimiento'))<span class="help-block"><strong>{{ $errors->first('notif_vencimiento') }}</strong></span>@endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('inactividad') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='longitud' class='col-md-6'>Tiempo de inactividad (min)</label>
                            <div class="col-md-12">
                                <input type="number" name="inactividad" value="{{$session->inactividad}}" class='form-control'>
                                @if ($errors->has('inactividad'))<span class="help-block"><strong>{{ $errors->first('inactividad') }}</strong></span>@endif
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <div
                                class="edit-check"
                                data-name="simultaneo"
                                data-label="Simultáneo desde distintas estaciones"
                                data-id="simultaneo"
                                data-checked="{!! ($session->simultaneo=='t')?'on':'off' !!}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <h5>Políticas de contaseñas</h5>
                        <hr>
                        <div class="form-group {{ $errors->has('longitud_minima') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='longitud' class='col-md-6'>Longitud Mínima</label>
                            <div class="col-md-12">
                                <input type="number" name="longitud_minima" value="{{$politicas->longitud_minima}}" class='form-control'>
                                @if ($errors->has('longitud_minima'))<span class="help-block"><strong>{{ $errors->first('longitud_minima') }}</strong></span>@endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-top:10px;">
                            <div
                                class="edit-check"
                                data-name="mayusculas"
                                data-label="Mayúsculas"
                                data-id="mayusculas"
                                data-checked="{!! ($politicas->mayusculas=='t')?'on':'off' !!}">
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <div
                                class="edit-check"
                                data-name="numeros"
                                data-label="Números"
                                data-id="numeros"
                                data-checked="{!! ($politicas->numeros=='t')?'on':'off' !!}">
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <div
                                class="edit-check"
                                data-name="carac_especiales"
                                data-label="Caracteres Especiales"
                                data-id="carac_especiales"
                                data-checked="{!! ($politicas->carac_especiales=='t')?'on':'off' !!}">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                <div class="box-footer text-center">
                    <button type="submit" class="btn-accept"></button>
                    <button type="reset" class="btn-cancel"></button>
                </div>
            </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{url('js/render_components.js')}} "></script>
    <script>
         renderComponents()
        let msg="Políticas de seguridad actualizadas correctamente";
        let status="{{session('status')}}"
        if(status=="correcto")
        {
            customModal('success',msg,true,'');
        }
    </script>
@stop