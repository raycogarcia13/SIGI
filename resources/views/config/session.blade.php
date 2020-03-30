@extends('template.base')

@section('title') Config | Accesos @stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}    " width="40" height="40" style="position:absolute;margin-left: -70px;margin-top: 0px;">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f"><div class="mark"></div>Inicios de sesión</a>
    </div>
@stop


@section('content')
<div class="container" style="margin-top: 2%;">
    <!-- Main content -->
                <form method="POST" action="{{ route('sesion.edit') }}">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('inactividad') ? ' has-error' : '' }}" style="margin-top:10px;">
                            <label for='longitud' class='col-md-6'>Tiempo de inactividad (min)</label>
                            <div class="col-md-6">
                                <input type="number" name="inactividad" value="{{$session->inactividad}}" class='form-control'>
                                @if ($errors->has('inactividad'))<span class="help-block"><strong>{{ $errors->first('inactividad') }}</strong></span>@endif
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="form-group" style="margin-top:10px;">
                            <label class="col-md-6">
                                <input @if($session->simultaneo=='t') checked @endif type="checkbox" name="simultaneo">
                                Simultáneo desde distintas estaciones
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="box-footer text-right col-md-4">
                    <button type="submit" class="btn-accept"></button>
                    <button type="reset" class="btn-cancel"></button>
                </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let msg="Datos de inicio de sesión actualizados correctamente.";
        let status="{{session('status')}}"
        if(status=="correcto")
        {
            customModal('success',msg,true,'');
        }
    </script>
@stop