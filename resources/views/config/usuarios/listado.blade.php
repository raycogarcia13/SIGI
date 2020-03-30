@extends('template.base')

@section('title') Config | Usuarios @stop

@section('current_section')
<img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;top:5px">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{url('/config/usuarios')}}" class="active-link-sidebar f"><div class="mark"></div>Usuarios</a>
    </div>
@stop

@section('crear_form')
    @include('config.usuarios.nuevo')
@stop

@section('content')
    @include('modal.global')

    <?php $user='yes'; ?>
    <div class="container" style="margin-top: 2%;">
        <iframe id="txtArea1" style="display:none"></iframe>
        <h3 style="font-weight: bold;color: #006837;">{{$header}}</h3>
            @include('template.inline_edit_sections.header')
        <div id="dataContent">
            <table class="table table-striped inline-edit">
                <thead>
                <tr class="fill">
                </tr>
                </thead>
                <tbody delete-path="{{$delete_path}}" update-path="{{$update_path}}" id="inline_edit_data" token="{{csrf_token()}}" ></tbody>
            </table>
            <ul class="pagination pagination-sm float-right" id="pagination"></ul>
            <ul class="float-left" id="pagination_info"></ul>
        </div>
    </div>
    <div id="table_disable_cover"></div>
@stop

@section('scripts')
    <script>
        function validarPass(field)
            {
                let pass=$(field).val();
                let longitud={{$politicas->longitud_minima}};
                let mayus='{{$politicas->mayusculas}}';
                let numeros='{{$politicas->numeros}}';
                let caract='{{$politicas->carac_especiales}}';
                let act=true;
                let msg='';
                //length
                if(pass.length < longitud)
                {
                    act=false;
                    msg+='Mínimo '+longitud+' caracteres '
                }
                //mayusculas 
                if(mayus)
                    if(!pass.match('[A-Z]'))
                        {
                            act=false;
                            msg+='| Mayúsculas ';
                        }
                //numeros
                if(numeros)
                    if(!pass.match('[0-9]'))
                        {
                            act=false;
                            msg+='| Números '
                        }
                //caracteres especiales
                if(numeros)
                    if(!pass.match('\\W+'))
                    {
                        act=false;
                        msg+='| Carácteres especiales '
                    }
                return {'status':act,msg:msg};
            }
    </script>
    <script src="{{ asset('js/table_inline_edit.js') }}"></script>
    <script src="{{ asset('js/validator/validator.js') }}"></script>
    <script src="{{ asset('js/validator/multifield.js') }}"></script>
    <script src="{{asset('vendor/jspdf/jspdf.min.js')}}"></script>
    <script src="{{asset('vendor/jspdf/jspdf.plugin.autotable.js')}}"></script>
    <script>
         var reactivar='{{$reactivar}}';
        let datosEdit={!!json_encode($table_form)!!};
        var validator = new FormValidator({"events" : ['blur', 'input', 'change']}, document.forms[0]);
        var keys=Object.keys(datosEdit);
        var values=Object.values(datosEdit);
        let headerTable='<th></th>';
         for(let i=0;i<values.length;i++)
            headerTable+='<th>'+values[i]['label']+'</th>';
         headerTable+='<th></th>';
        $('.fill').html(headerTable);
        var user_icon = '{{asset("images/iconos/config/SVG__CUPET_Btn_Active User.svg")}}';
        //Tipo de usuario seleccionado por defecto
        var tipoUsuarioSeleccionado = 'trabajador';
        //Estado de usuarios seleccionados por defecto
        var estadoUsuarioSeleccionado = 1;
        //Listado de personas segun el tipo de trabajador seleccioando
        var listadoPersonas = [];
        //Cantidad de registros por pagina
        var cantidadPorPagina = $("#cantidad_por_pagina").text();
        //Cargando la primera vez los usuarios activos del sistema
        function loadInlineEditData(url){
            $.get(url,{},function(response){
                $("#inline_edit_data").html("");
                $.each(response.data,function(i,value){
                    let bhtml='<tr check="no" data-id="'+value.id+'">\n'+
                        '<td width="5%">\n'+
                        '<img src="{{asset('images/iconos/config/SVG__CUPET_Btn_Check_Off.svg')}}" alt="" width="20" class="check">\n'+
                        '</td>\n';
                    for(let i=0;i<keys.length;i++)
                    {
                        let fist=i;
                        if(values[i]['edit']==true)
                        {
                            let fist=(i==0)?'fist-edit':'';
                            if(values[i]['type']=='text')
                                bhtml+='<td class="edit-input '+fist+'" type-row="text" data-name="'+keys[i]+'" edit-current-value="'+eval('value.'+keys[i])+'"></td>\n';
                            else if(values[i]['type']=='select')
                            {
                                let dataS=Object.keys(values[i]['options']).join('|');
                                let labelS=Object.values(values[i]['options']).join('|');
                                bhtml+='<td class="edit-select '+fist+'" data="'+dataS+'" label="'+labelS+'" data-name="'+keys[i]+'" edit-current-value="'+eval('value.'+keys[i])+'"></td>\n';
                            }
                        }
                        else
                        {
                            if(values[i]['type']=='date')
                            {
                                let fech=new Date(eval('value.'+keys[i]));
                                let complete=fech.getFullYear()+'-'+fech.getMonth()+'-'+fech.getDate()+' '+fech.getHours()+':'+fech.getMinutes();
                                bhtml+= '<td>'+complete+'</td>\n';
                            }
                            else
                                bhtml+= '<td>'+eval('value.'+keys[i])+'</td>\n';

                        }
                            
                    }
                    bhtml+=   '<td class="edit-options">\n'+
                        '<a href="#" class="edit-element float-right" data-id="'+value.id+'"><img src="{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}" alt="Editar" width="35" height="35"></a>\n'+
                        '</td>\n'+
                        '</tr>';
                    $("#inline_edit_data").append(bhtml);
                });

                setBasicClickEvents();
                $("#pagination_info").html("");

// if(response.last_page>1){
    var prev_page_disabled = (response.prev_page_url==null)?'disabled':'';
    var next_page_disabled = (response.next_page_url==null)?'disabled':'';
    var first_page_disabled = (response.current_page==1)?'disabled':'';
    var last_page_disabled = (response.last_page==response.current_page)?'disabled':'';
    $("#pagination").html("");
    $("#pagination").append("<li class=\"page-item "+first_page_disabled+"\"><a class='page-link' href='"+response.first_page_url+"&cantidad="+cantidadPorPagina+"&estado="+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+"'><<span aria-hidden=\"true\">«</span></a></li>");
    $("#pagination").append("<li class=\"page-item "+prev_page_disabled+"\"><a class='page-link' href='"+response.prev_page_url+"&cantidad="+cantidadPorPagina+"&estado="+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+"'><span aria-hidden=\"true\">«</span></a></li>");

    if(response.last_page>3){

        let suma = (response.current_page+2<=response.last_page)?2:0

        // if(response.current_page>2){
            //     let  pg = response.current_page-2
            //     $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+pg+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'" class="page-link">'+pg+'</a></li>');
            //     $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');
            // }

            if(response.current_page+2<response.last_page){
                 if(response.current_page>2){
                let  pg = response.current_page-2
                $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+pg+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+pg+'</a></li>');
                $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');
            }
                for (i=response.current_page;i<=response.current_page+suma;i++){
                    var active = (response.current_page==i)?'active':'page-item';
                    $("#pagination").append('<li class="page-item '+active+'"><a href="{{url($data_path.'?page=')}}'+i+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+i+'</a></li>');
                }
                $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');
                $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+response.last_page+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+response.last_page+'</a></li>');
            }

            if(response.current_page+2==response.last_page){

                let  pg = response.current_page-3
                $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+pg+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+pg+'</a></li>');
                $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');

                suma = 2
                for (i=response.current_page-1;i<=response.current_page+suma;i++){
                    var active = (response.current_page==i)?'active':'page-item';
                    $("#pagination").append('<li class="page-item '+active+'"><a href="{{url($data_path.'?page=')}}'+i+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+i+'</a></li>');
                }
            }

            if(response.current_page+1==response.last_page){
                let  pg = response.current_page-4
                $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+pg+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+pg+'</a></li>');
                $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');
                suma = 1
                for (i=response.current_page-2;i<=response.current_page+suma;i++){
                    var active = (response.current_page==i)?'active':'page-item';
                    $("#pagination").append('<li class="page-item '+active+'"><a href="{{url($data_path.'?page=')}}'+i+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+i+'</a></li>');
                }
            }

            if(response.current_page==response.last_page){
                let  pg = response.current_page-4
                $("#pagination").append('<li class="page-item"><a href="{{url($data_path.'?page=')}}'+pg+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+pg+'</a></li>');
                $("#pagination").append('<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">...</a></li>');
                for (i=response.current_page-2;i<=response.current_page+suma;i++){
                    var active = (response.current_page==i)?'active':'page-item';
                    $("#pagination").append('<li class="page-item '+active+'"><a href="{{url($data_path.'?page=')}}'+i+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+i+'</a></li>');
                }
            }

        }else{
            for (i=1;i<=response.last_page;i++){
                var active = (response.current_page==i)?'active':'page-item';
                $("#pagination").append('<li class="page-item '+active+'"><a href="{{url($data_path.'?page=')}}'+i+'&cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+'" class="page-link">'+i+'</a></li>');
            }
        }

        $("#pagination").append("<li class=\"page-item "+next_page_disabled+"\"><a class='page-link' href='"+response.next_page_url+"&cantidad="+cantidadPorPagina+"&estado="+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+"'><span aria-hidden=\"true\">»</span></a></li>");
        $("#pagination").append("<li class=\"page-item "+last_page_disabled+"\"><a class='page-link' href='"+response.last_page_url+"&cantidad="+cantidadPorPagina+"&estado="+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val()+"'><span aria-hidden=\"true\">»</span>></a></li>");
        // }else{
            //     $("#pagination").html("");
            // }

            var elementos_word = (response.total>1)?'elementos':'elemento';
            $("#pagination_info").html("Mostrando del "+response.from+" al "+response.to+" de "+response.total+" "+elementos_word);

            var rp = (response.per_page>20)?'...':response.per_page;
            $("#cantidad_por_pagina").html(rp);
            //Acciones del paginado via ajax
            $(".page-link").on('click',function(){
                loadInlineEditData($(this).attr('href'));
                return false;
            });
            inlineEditInit();
            });
        }

        loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado);
        // Quitar el indicador de uso
        function unsetBorderTop(){
            $("#loadActiveUser,#loadInactiveUser").removeClass('active-border-top');
        }

        // Mostrar y ocultar el formulario para crear usuario
        function addUserShowForm(){
            if($("#addUser").attr("status")=='off'){
                $(".add-inline-edit").fadeIn('fast');
                disableTableReposition('yes');
                $("#addUser").attr("status",'on').addClass('active-border-top');
            }else{
                disableTableReposition('no');
                $(".add-inline-edit").fadeOut('fast');
                $("#addUser").attr("status",'off').removeClass('active-border-top');
            }
        }

        // Acciones para elementos enerados
        function accionesParaGenerados(){
            $(".seleccionar-persona").off().on('click',function(){
                var this_object = $(this);
                $("#persona_id").val(this_object.data('id'));
                $("#selecciona_persona").html(this_object.data('name'));
                backDropTransparente('eliminar');
                $("#lista_trabajadores_invitados").hide();
                return false;
            });
        }
        // Cargar personas por tipo
        function getPersonasXTipo(tipo){
            $.ajax({
                url:"{{url('/config/getPersonas/')}}/"+tipo,
                dataType:'json',
                success:function(response){
                    $(".list").html("");
                    if(response.length>0){
                        listadoPersonas=response;
                        $('#filtro_t_i').removeAttr('disabled');
                        $.each(response,function(i,value){
                            $('.list').append('<a href="#" data-name="<img src=\''+user_icon+'\' height=20 width=20> '+value.nombre+'" data-id="'+value.id+'" class="seleccionar-persona"><img src="{{asset('images/iconos/config/SVG__CUPET_Btn_Active User.svg')}}" alt="" height="20" width="20"> '+value.nombre+'</a>');
                        });
                        accionesParaGenerados();
                    }else{
                        listadoPersonas=[]; //Arreglo vacio
                        $('#filtro_t_i').attr('disabled','disabled');
                        $(".list").html("<small>No hay personas para listar</small>");
                    }
                }
            });
        }

        $(function(){
            //Acciones para el boton de adicionar usuario
            $("#addUser").on('click',function(){
                getPersonasXTipo(tipoUsuarioSeleccionado);
                addUserShowForm();
                return false;
            });
            /*
               Acciones para el boton de seleccionar persona es solo para este apartado y para seguridad ya que el
               usuario no se crea directamente desde este modulo sino desde la tabla de trabajador que puede ser trabajaor o invitado
            */
            $("#selecciona_persona").on('click',function(){
                // $("#filtro_t_i").focus();
                $("#lista_trabajadores_invitados").toggle();
                accionesParaGenerados();
                backDropTransparente('adicionar');
                return false;
            });
            /*
            * Seleccionando el invitado o trabajador para crear una cuenta de usuario de acceso al sistema*/
            $("#selec_trabajador").children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-Guest-On.svg')}}');
            $("#selec_trabajador").off().on('click',function(){
                $(this).children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-User-On.svg')}}');
                $("#selec_invitado").children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-Guest-Off.svg')}}');
                tipoUsuarioSeleccionado='trabajador';
                $('#persona_tipo').val('trabajador');
                $("#persona_id").val("");
                getPersonasXTipo(tipoUsuarioSeleccionado);
                $("#selecciona_persona").html("Selecciona una persona");

                return false;
            });
            $("#selec_invitado").off().on('click',function(){
                $(this).children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-Guest-On.svg')}}');
                $("#selec_trabajador").children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-User-Off.svg')}}');
                tipoUsuarioSeleccionado='invitado';
                $("#persona_id").val("");
                $('#persona_tipo').val('invitado');
                getPersonasXTipo(tipoUsuarioSeleccionado);
                $("#selecciona_persona").html("Selecciona una persona");

                return false;
            });
            // Acciones de los botones de crear usuario y cancelar
            $("#crearForm").off().on('click',function(){
                let validatorResult = validator.checkAll(document.forms[0]);
                if(validatorResult.valid!=true)
                {
                    let msg='El formulario contiene errores, por favor, revíselo';
                    customModal('error',msg,true,'');
                }
                else if($("#persona_id").val()=="")
                {
                    let msg='Debe escoger a una persona para la cuenta';
                    customModal('error',msg,true,'');
                }
                else
                {
                    let data_array=$('#crearDataForm').serialize();
                    $.post("/config/usuarios", data_array, function(response) {
                        if (response.success == true)
                        {
                            refreshData();
                            $(".add-inline-edit").fadeOut('fast');
                            $("#addUser").attr("status",'off').removeClass('active-border-top');
                            document.forms[0].reset();
                            customModal('success','Adición satisfactoria',true,'');
                        }
                        else
                            customModal('error', "El usuario ya existe", true, '');
                    });
                }
            });

            $("#cancelarCrearForm").off().on('click',function(){
                $(".add-inline-edit").fadeOut('fast');
                $("#selec_trabajador").children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-User-On.svg')}}');
                $("#selec_invitado").children('img').attr('src','{{asset('images/iconos/config/SVG___CUPET_Btn_Add-Guest-Off.svg')}}');
                $("#addUser").attr("status",'off').removeClass('active-border-top');
                disableTableReposition('no');
                $("#selecciona_persona").html("Selecciona una persona");
                $("#persona_id").val("");
                $("#persona_tipo").val("trabajador");
                document.forms[0].reset();
                return false;
            });
            // Acciones usuarios activos e inactivos
            // Iniciar con los usuarios activos
            $("#loadActiveUser").addClass('active-border-top');
            $("#loadActiveUser").off().on('click',function(){
                unsetBorderTop();
                estadoUsuarioSeleccionado = 1;
                loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado);
                $(this).addClass('active-border-top');
                $(".inline-edit").removeClass('table-striped-inactive').removeClass('table-inactive')
                $(".inline-edit").addClass('table-striped')
                $("#reactivarAction").hide();
                $("#addUser").show();
                return false;
            });
            $("#loadInactiveUser").off().on('click',function(){
                unsetBorderTop();
                estadoUsuarioSeleccionado = 0;
                $(".inline-edit").removeClass('table-striped')
                $(".inline-edit").addClass('table-striped-inactive').addClass('table-inactive')
                loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado);
                $(this).addClass('active-border-top');
                $("#reactivarAction").show();
                $("#addUser").hide();
                return false;
            });
            // Inicia buscando trabajdores por defecto
            getPersonasXTipo(tipoUsuarioSeleccionado);
            // Displaying Information to Users
            function cargarDatos(data) {
                $(".list").html('');
                if(data.length>0){
                    $('#filtro_t_i').removeAttr('disabled');
                    $.each(data, function(index, value){
                        $('.list').append('<a href="#" data-name="<img src=\''+user_icon+'\' height=20 width=20> '+value.nombre+'" data-id="'+value.id+'" class="seleccionar-persona"><img src="{{asset('images/iconos/config/SVG__CUPET_Btn_Active User.svg')}}" alt="" height="20" width="20"> '+value.nombre+'</a>');
                    });
                    accionesParaGenerados();
                }else{
                    $(".list").html("<small>Sin resultados</small>");
                }
            }
            // Filtrando personas para crear cuenta
            function filtrarPersonas(datos) {
                var val = $("#filtro_t_i").val();
                if(val !='') {
                    searchVal = val;
                    var searchResults = {};
                    searchResults = [];
                    $.each(datos, function(i, v) {
                        if (v.nombre.toLowerCase().indexOf(val) != -1 || v.nombre.indexOf(val) != -1 || v.ci.toLowerCase().indexOf(val) != -1) {
                            searchResults.push(v);
                        }
                    });
                    cargarDatos(searchResults);
                }else{
                    cargarDatos(listadoPersonas);
                }
            }
            //Accion del filtro
            $("#filtro_t_i").off().on('keyup',function(){
                filtrarPersonas(listadoPersonas);
                if($(this).val()!=''){
                    $("#limpiarFiltro").show();
                }else{
                    $("#limpiarFiltro").hide();
                }
                return false;
            });
            $("#limpiarFiltro").on('click',function(){
                $('#filtro_t_i').val('');
                cargarDatos(listadoPersonas);
                $(this).hide();
            });
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
                loadInlineEditData('{{route('getUsuarios')}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado);
                $(this).parent('div').toggle();
                backDropTransparente('eliminar');
                return false;
            });

        });
        function disableTableReposition(status){
            if(status=='yes'){
                $("#dataContent,#headerInlineEditContent").addClass('lock')
            }else if(status == 'no'){
                $("#dataContent,#headerInlineEditContent").removeClass('lock')
            }
            inHabilitar()
        }

        $("#search_on_table").on('keyup',function(){
            loadInlineEditData('{{url($data_path)}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$(this).val())
        })

        $('#csvExport').click(function(){
            let uri='{{$data_path}}?cantidad=...';
            $.get(uri,{},function(response){
                let data=[];
                $.each(response.data,function(i,value){

                    data.push(Object.values(value));
                });
                toCsv(data)
            });
        })

        $('#wordExport').click(function(){
            let uri='{{$data_path}}?cantidad=...';
            $.get(uri,{},function(response){
                let data='<table style="border:none;width:100%;"><thead>'+headerTable;
                data+='</thead><tbody>'
                $.each(response.data,function(i,value){
                    data+='<tr><td></td>';
                    for(let i=0;i<keys.length;i++)
                    {
                        data+='<td>'+eval('value.'+keys[i])+'</td>'
                    }
                    data+='<td></td></tr>';
                });
                data+='</tbody></table>';
                toWord(data,'DatosWord');
            });
        })

        $('#excelExport').click(function(){
            let uri='{{$data_path}}?cantidad=...';
            $.get(uri,{},function(response){
                let data='<table><thead>'+headerTable;
                data+='</thead><tbody>'
                $.each(response.data,function(i,value){
                    data+='<tr><td></td>';
                    for(let i=0;i<keys.length;i++)
                    {
                        data+='<td>'+eval('value.'+keys[i])+'</td>'
                    }
                    data+='<td></td></tr>';
                });
                data+='</tbody></table>';
                toExcel(data);
            });
        })

        $('#pdfExport').click(function(){
            let uri='{{$data_path}}?cantidad=...';
            $.get(uri,{},function(response){
                let data={};
                var bod=[];
                $.each(response.data,function(i,value){
                    let item=[];
                    for(let i=0;i<keys.length;i++)
                        item.push(eval('value.'+keys[i]));
                    bod.push(item);
                });
                var values=Object.values(datosEdit);
                let header=[];
                for(let i=0;i<values.length;i++)
                    header.push(values[i]['label']);
                data.header=header;
                data.body=bod;
                console.log(data);
                toPdf(data,'Listado de Usuarios');
            });
        })

        function  moveTable(action) {
            if(estadoUsuarioSeleccionado==1)
            {
            var token = $('#inline_edit_data').attr('token');
            var ids = [];

            $('table tbody tr').each(function() {
                var this_item = $(this);
                if (this_item.attr('check') == 'yes') {
                    ids.push(this_item.attr('data-id'));
                }
            });

            moveElements(ids, action, token, "public.config_usuario");

            }

        }
        function refreshData()
        {
            loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val());
        } 


    </script>
@stop
