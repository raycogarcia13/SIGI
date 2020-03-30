@extends('template.base')

@section('title') Config | Empresa @stop

@section('styles')
    {{--    Styles here--}}
@stop

@section('current_section')
    <img src="{{asset('images/iconos/config/SVG__CUPET_ID_Config.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;top:5px">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{url('config/empresa')}}" class="active-link-sidebar f"><div class="mark"></div>Empresa</a>
    </div>
@stop

@section('content')
    {{--    Page Content--}}
    <div class="col-lg-7 offset-lg-3" style="margin-top: 3%;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 title-config"><div class="mark"></div> Código</div>
                    <div class="col-md-8 text-config">
                        <input type="text" class="inline-edit edit-no" value="{{$empresa->codigo}}" id="codigo" disabled>
                    </div>
                    <div class="col-md-2">
                        <div id-target="codigo" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> Nombre</div>
                    <div class="col-md-8 text-config">
                        <textarea class="inline-edit edit-no" style="resize: none;" id="nombre" disabled>{{$empresa->nombre}}</textarea>
                    </div>
                    <div class="col-md-2">
                        <div id-target="nombre" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> Acrónimo</div>
                    <div class="col-md-8 text-config">
                        <input type="text" class="inline-edit edit-no" value="{{$empresa->acronimo}}" disabled id="acronimo">
                    </div>
                    <div class="col-md-2">
                        <div id-target="acronimo" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> Organismo</div>
                    <div class="col-md-8 text-config">
                        <input type="text" id="organismo" class="inline-edit edit-no" value="{{$empresa->organismo}}">
                    </div>
                    <div class="col-md-2">
                        <div id-target="organismo" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <form action="/config/empresa/edit" enctype="multipart/form-data" method="POST" id="identidadForm">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> Identidad</div>
                    <div class="col-md-8 text-config">
                        <div style="padding: 8px;border:1px dashed #999999;">
                            <img id="imgemrpesa" src="{{url('storage/'.$empresa->logo)}}" width="200" alt="">
                        </div>
                    </div>
                    <div class="col-md-2">
                    <input type="file" onchange="enviar($('#logo'))" name="logo" id="logo" accept=".jpg, .jpeg, .png" style="display: none;">
                        <div class="" id="btnFoto" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_LoadFile.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex; cursor:pointer"></div>
                    </div>
                </div>
                </form>

                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> DPA</div>
                    <div class="col-md-8 text-config">
                        <input type="text" class="inline-edit edit-no" disabled id="dpa" value="{{$empresa->dpa}}">
                    </div>
                    <div class="col-md-2">
                        <div id-target="dpa" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> NAE</div>
                    <div class="col-md-8 text-config">
                        <input type="text" id="nae" class="inline-edit edit-no" disabled value="{{$empresa->nae}}">
                    </div>
                    <div class="col-md-2">
                        <div id-target="nae" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-2 title-config"><div class="mark"></div> REEUP</div>
                    <div class="col-md-8 text-config">
                        <input type="text" class="inline-edit edit-no" disabled value="{{$empresa->reeup}}" id="reeup">
                    </div>
                    <div class="col-md-2">
                        <div id-target="reeup" class="edit-this" style="background-image: url('{{asset('images/iconos/config/SVG__CUPET_Btn_Config.svg')}}');background-size: cover; width: 25px;height: 25px;display: inline-flex;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('#btnFoto').click(function(){
            $('#logo').
            alert('si');
            $('#logo').click();
        })
        function enviar(item)
        {
            var id=$(item).attr('id');
            var value=$(item).val();
            var type=$(item).attr('type');
            let uri='/config/empresa/edit'
            
            if(type=='file')
            {
                let formdata=new FormData($('#identidadForm')[0]);
               $.ajax({
                   url:uri,
                   method:'POST',
                   data:formdata,
                   cache:false,
                   contentType:false,
                   processData:false,
                   success:function(data){
                        toastr.success(data.msg);
                        $("#imgemrpesa").attr('src','/storage/'+data.data);
                   },
                   error:function(data){
                    toastr.error("Ha ocurrido un problema al guardar la imagen: "+data);
                   }
               })

            }
            else
            {
                let formdata={
                element:id,
                tipo:type,
                _token:$('meta[name="csrf-token"]').attr('content'),
                valor:value
                }
                axios.put(uri,formdata).then((response)=>{
                    toastr.success(response.data);
                });
            }
            limpiar(item);
        }

        function limpiar(item)
        {
            var this_item = $(item);
            let id=$(item).attr('id');
            var id_target = this_item.attr('id-target');
            inlineEditReset();
            $(this).parent('div').remove();
            $('.edit-this').attr('style',edit_this_inactive);
            $("#"+id)
                .removeClass('edit-yes')
                .attr('disabled','disabled')
                .addClass('edit-no');
            
            $('.options').remove();
            return false;
        }
                
        function inlineEditReset(){
            $('.inline-edit').removeClass('edit-yes').addClass('edit-no');
        }
        var edit_this_active = "background-image: url('{{ asset('images/iconos/config/SVG__CUPET_Btn_Config.svg') }}');background-size: cover; width: 25px;height: 25px;display: inline-flex;",
            edit_this_inactive = "background-image: url('{{ asset('images/iconos/config/SVG__CUPET_Btn_Config.svg') }}');background-size: cover; width: 25px;height: 25px;display: inline-flex;";

        $(function(){
            $(".edit-this").off().on('click',function(){
                var this_item = $(this);
                var id_target = this_item.attr('id-target');
                inlineEditReset();
                $('.edit-this').parent('div').children('.options').remove();
                $('.edit-this').attr('style',edit_this_inactive);
                this_item.parent('div').append('<div class="options"><a href="javascript:enviar('+id_target+')" class="update-square" id-target="'+id_target+'"></a><a href="#" onclick="limpiar('+id_target+')" id-target="'+id_target+'" class="cancel-square"></a></div>');
                this_item.attr('style',edit_this_active);
                $("#"+id_target)
                    .removeClass('edit-no')
                    .removeAttr('disabled')
                    .addClass('edit-yes')
                    .trigger('focus');
                $(this).hide();
                return false;
            });

        });
    </script>
@stop
