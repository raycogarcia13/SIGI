@extends('template.base')

@section('title') Config | Permisos @stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;top:5px">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f"><div class="mark"></div>Permisos</a>
    </div>
@stop

@section('content')
    @include('modal.global')
    <div id="permission_list"></div>
    <div id="e"></div>
    <div class="container" style="margin-top: 2%;">
            <h3 style="font-weight: bold;color: #006837;">Permisos</h3>
            <?php $permission = true ?>
        @include('template.inline_edit_sections.header')
        <table class="table table-striped inline-edit">
            <thead>
            <tr class="fill">
                <th width="30"></th>
                <th width="30">No.</th>
                <th width="100">Usuario</th>
                <th width="250">Nombre</th>
                <th width="150">CI</th>
                <th>Fecha Creado [A/M/D]</th>
                <th width="200">Permisos</th>
                <th width="70"></th>
            </tr>
            </thead>
            <tbody update-path="{{$update_path}}" id="inline_edit_data" token="{{csrf_token()}}"></tbody>
        </table>
    </div>
@endsection
@section('scripts')

    <script src="{{asset('js/listas_acceso.js')}}"></script>

    <script>
        var estadoUsuarioSeleccionado=1;
        function cargarDatos(cant)
        {
            $.get('{{url("/config/getPermisos")}}'+'?cantidad='+cant,{},function(response){
                $("#inline_edit_data").html("");
                $.each(response.data,function(i,value){
                    var lista_acceso = '';
                    $.each(value.permisos, function(i,ind){
                        if(ind.modulo_id==modulo_actualid)
                            lista_acceso = lista_acceso+'|' +ind.id+":"+ind.nombre;
                    });

                    let fech=new Date(value.created_at);
                    let complete=fech.getFullYear()+'-'+fech.getMonth()+'-'+fech.getDate()+' '+fech.getHours()+':'+fech.getMinutes();
                    $("#inline_edit_data").append(`<tr check="no" data-id="`+value.id+`" id="permission_row_`+value.id+`">
                        <td width="20">
                        <img src="`+base_path+'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg'+`" alt="" width="20" class="check">
                        </td>
                        <td>`+value.position+`</td>
                        <td>`+value.username+`</td>
                        <td>`+value.persona.nombre+` `+value.persona.primer_apellido+` `+value.persona.segundo_apellido+`</td>
                        <td>`+value.persona.ci+`</td>
                        <td>`+complete+`</td>
                        <td class="edit-permissions" data="`+lista_acceso+`" data-id="`+value.id+`">Permisos</td>
                        <td class="edit-options">
                        <a href="#" class="edit-element float-right" data-id="'+value.id+'"><img src="`+base_path+'images/iconos/config/SVG__CUPET_Btn_Config.svg'+`" alt="Editar" width="35" height="35"></a>
                        </td>
                        </tr>`);
                });
                inlineEditInit()
            });
        }

        $("#boton_cantidad_registros_mostar").off().on('click',function(){
            if($(this).data('status')=='off'){
                $(this).attr('data-status','on');
                $("#cantidad_registros").fadeIn('fast');
                backDropTransparente('adicionar');
            }else{
                $(this).attr('data-status','off');
                $("#cantidad_registros").fadeOut('fast');
                backDropTransparente('eliminar');
            }
            return false;
        });

        $("#cantidad_registros a").on('click',function(){
                $("#cantidad_por_pagina").text($(this).text());
                cantidadPorPagina =$("#cantidad_por_pagina").text();
                cargarDatos(cantidadPorPagina);
                $(this).parent('div').toggle();
                backDropTransparente('eliminar');
                return false;
        });


    </script>
@stop


