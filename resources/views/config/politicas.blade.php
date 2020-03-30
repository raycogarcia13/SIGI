@extends('template.base')

@section('title') Config | Accesos @stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;top:5px">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f"><div class="mark"></div>Políticas de contraseñas</a>
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
                        <div class="form-group {{ $errors->has('longitud_minima') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='longitud' class='col-md-6'>Longitud Mínima</label>
                            <div class="col-md-12">
                                <input type="number" name="longitud_minima" value="{{$politicas->longitud_minima}}" class='form-control'>
                                @if ($errors->has('longitud_minima'))<span class="help-block"><strong>{{ $errors->first('longitud_minima') }}</strong></span>@endif
                            </div>
                        </div>
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
                    </div>
                    <div class="col-md-6 pull-right" style="margin-top:20px">
                        <div class="form-group" style="margin-top:10px;">
                            <label>
                                <input class="icheck icheckbox_square" @if($politicas->mayusculas=='t') checked @endif type="checkbox" name="mayusculas"> Mayúsculas
                            </label>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <label>
                                <input class="icheck icheckbox_square" @if($politicas->numeros=='t') checked @endif type="checkbox" name="numeros"> Números
                            </label>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <label>
                                <input class="icheck icheckbox_square" @if($politicas->carac_especiales=='t') checked @endif type="checkbox" name="carac_especiales"> Caracteres Especiales
                            </label>
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
    <script>
        let msg="Políticas de contraseñas actualizadas correctamente";
        let status="{{session('status')}}"
        if(status=="correcto")
        {
            customModal('success',msg,true,'');
        }
    </script>
@stop