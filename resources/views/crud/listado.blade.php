@extends('template.base')

@section('title') {{$base_title}} @stop

@section('current_section')
    <img src="{{asset($base_icono)}}" width="40" height="40" style="position:absolute;margin-left: -70px;margin-top: 0px;">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{Request::url()}}" class="active-link-sidebar f">
            <div class="mark"></div>
            {{$header}}
        </a>
    </div>
@stop

@section('crear_form')
        @include('crud.nuevo')
@stop

@section('content')
    @include('modal.global')
    <?php $user='yes'; ?>
    <div class="container" style="margin-top: 2%;">
        <iframe id="txtArea1" style="display:none"></iframe>
        <h3 style="font-weight: bold;color: #006837;">{{$header}}</h3>
        @include('template.inline_edit_sections.header')
        <div id="dataContent">
            <table id="tableData" class="table table-striped inline-edit">
                <thead>
                <tr class="fill">
                </tr>
                </thead>
                <tbody delete-path="{{$delete_path}}" update-path="{{$update_path}}" id="inline_edit_data" token="{{csrf_token()}}" table="{{$table}}"></tbody>
            </table>
            <ul class="pagination pagination-sm float-right" id="pagination"></ul>
            <ul class="float-left" id="pagination_info"></ul>
        </div>
    </div>
    <div id="table_disable_cover"></div>
@stop

@section('scripts')
    <script src="{{ asset('js/render_components.js') }}"></script>
    <script src="{{ asset('js/table_inline_edit.js') }}"></script>
    <script src="{{ asset('js/validator/validator.js') }}"></script>
    <script src="{{ asset('js/validator/multifield.js') }}"></script>
    <script src="{{asset('vendor/jspdf/jspdf.min.js')}}"></script>
    <script src="{{asset('vendor/jspdf/jspdf.plugin.autotable.js')}}"></script>

    <script>
        renderComponents();
        var reactivar='{{$reactivar}}';
        var validator = new FormValidator({"events" : ['blur', 'input', 'change']}, document.forms[0]);
        let datosEdit={!!json_encode($table_form)!!};
        let storeUrl='{{$store}}';
         var keys=Object.keys(datosEdit);
         var values=Object.values(datosEdit);
        let headerTable='<th></th>';
         for(let i=0;i<values.length;i++)
            headerTable+='<th>'+values[i]['label']+'</th>';
         headerTable+='<th></th>';
        $('.fill').html(headerTable);
        var user_icon = '{{asset("images/iconos/config/SVG__CUPET_Btn_Active User.svg")}}';
        //Estado de usuarios seleccionados por defecto
        var estadoUsuarioSeleccionado = 1;
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
                            let actual=value[keys[i]];
                            let fist=(i==1)?'fist-edit':'';
                            if(values[i]['type']!='select')
                                bhtml+='<td class="edit-input" type-row="'+values[i]["type"]+'" '+fist+' data-name="'+keys[i]+'" edit-current-value="'+eval('value.'+keys[i])+'"></td>\n';
                            else if(values[i]['type']=='select')
                            {
                                let dataS=Object.keys(values[i]['options']);
                                let labelS=Object.values(values[i]['options']);
                                let dataSelect=[];
                                for(let j=0;j<dataS.length;j++){
                                    dataSelect.push(labelS[j]+':'+dataS[j]);
                                    if(actual==dataS[j])
                                        actual=labelS[j];
                                }
                                dataSelect=dataSelect.join('|');
                                bhtml+='<td class="edit-input" options="'+dataSelect+'" type-row="'+values[i]["type"]+'" '+fist+' data-name="'+keys[i]+'" edit-current-value="'+actual+'"></td>\n';
                            }
                        }
                        else
                            bhtml+= '<td>'+eval('value.'+keys[i])+'</td>\n';
                    }
                    bhtml+='<td class="edit-options">\n'+
                        '<a href="#" class="edit-element float-right" data-id="'+value.id+'"><img src="{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}" alt="Editar" width="35" height="35"></a>\n'+
                        '</td>\n'+
                        '</tr>';
                    $("#inline_edit_data").append(bhtml);
                });
                renderComponents();

                setBasicClickEvents()

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
        loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val());
        // Quitar el indicador de uso
        function unsetBorderTop(){
            $("#loadActiveUser,#loadInactiveUser").removeClass('active-border-top');
        }
        // Mostrar y ocultar el formulario para crear usuario
        function addUserShowForm(){
            if($("#addUser").attr("status")=='off'){
                $(".add-inline-edit").fadeIn('fast');
                $("#addUser").attr("status",'on').addClass('active-border-top');
                disableTableReposition('yes')
            }else{
                $(".add-inline-edit").fadeOut('fast');
                $("#addUser").attr("status",'off').removeClass('active-border-top');
                disableTableReposition('no')
            }
        }

        $("#crearDataForm").on('reset',function(e){
            validator.reset();
        })

        $(function(){
            //Acciones para el boton de adicionar usuario
            $("#addUser").on('click',function(){
                addUserShowForm();
                return false;
            });
            // Acciones de los botones de crear usuario y cancelar
            $("#crearForm").off().on('click',function(){
                let validatorResult = validator.checkAll(document.forms[0]);
                if(validatorResult.valid!=true)
                {
                    let msg='';
                    $.each(validatorResult.fields,function(i,value){
                        if(value.valid==false)
                        {
                            if(value.error=="demasiado extenso")
                            {
                                msg='La cantidad de caracteres del Acrónimo no puede exceder a la del nombre';
                                return true;
                            }
                            else
                            {
                                msg='Debe Insertar nombre y acrónimo';
                                return true;
                            }
                        }
                    })
                    customModal('error',msg,true,'');
                }
                else
                {
                    let data_array=$('#crearDataForm').serialize();
                    console.log(data_array);
                    $.post(storeUrl, data_array, function(response) {
                        if (response.success == true)
                        {
                            refreshData();
                            $(".add-inline-edit").fadeOut('fast');
                            $("#addUser").attr("status",'off').removeClass('active-border-top');
                            disableTableReposition('no');
                            document.forms[0].reset();
                            customModal('success','Adición satisfactoria',true,'');
                        }
                        else
                        {
                            if(response.data)
                            {
                            customModal('error', "El "+response.data+" ya existe", true, '');
                            }
                            else
                                customModal('error', "El nombre y/o acrónimo ya existen", true, '');
                        }
                    });
                }
            });

            $("#cancelarCrearForm").off().on('click',function(){
                $(".add-inline-edit").fadeOut('fast');
                $("#addUser").attr("status",'off').removeClass('active-border-top');
                disableTableReposition('no');
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
                loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado);
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
                toPdf(data,'{{$header}}');
            });
        })

        function moveTable(action) {
            if(estadoUsuarioSeleccionado==1)
            {
            var token = $('#inline_edit_data').attr('token');
            var table = $('#inline_edit_data').attr('table');
            var ids = [];

            $('table tbody tr').each(function() {
                var this_item = $(this);
                if (this_item.attr('check') == 'yes') {
                    ids.push(this_item.attr('data-id'));
                }
            });

            moveElements(ids, action, token, table);

            }

        }
        function refreshData()
        {
            loadInlineEditData('{{$data_path}}?cantidad='+cantidadPorPagina+'&estado='+estadoUsuarioSeleccionado+'&filtro='+$("#search_on_table").val());
        }
    </script>
@stop

