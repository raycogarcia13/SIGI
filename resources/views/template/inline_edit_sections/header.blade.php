<div class="add-inline-edit">
    @yield('crear_form')
</div>
<div id="headerInlineEditContent">
<div class="header-inline-edit">
    {{--Left Side--}}
    @if(!isset($permisos))
        @if(!isset($noCrud))
            @if(isset($user))
                <a href="#" id="loadActiveUser" class="float-left btnHover" data-icon="S_Btn_Active"><img src="{{asset('images/iconos/config/S_Btn_Active_StandBy.svg')}}" alt="" width="30" height="30"></a>
                <a href="#" id="loadInactiveUser" class="float-left btnHover" data-icon="S_Btn_Inactive"><img src="{{asset('images/iconos/config/S_Btn_Inactive_StandBy.svg')}}" alt="" width="30" height="30"></a>
                <div class="float-left divider-actions-table-inline-edit"></div>
            @endif
            <a href="#" id="addUser" status="off" class="float-left btnHover" data-icon="S_Btn_Add"><img src="{{asset('images/iconos/config/S_Btn_Add_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <a href="#" id="reactivarAction" data-icon="S_Btn_reactivar" class="float-left btnHover" style="display: none;"><img src="{{asset('images/iconos/config/S_Btn_reactivar_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <a href="#" id="delete_records" path="{{$delete_path}}" token="{{csrf_token()}}" data-icon="S_Btn_delete" class="float-left"><img src="{{asset('images/iconos/config/S_Btn_delete_StandBy.svg')}}" alt="" width="30" height="30"> <span id="quantity_selected"></span></a>
            <div class="float-left divider-actions-table-inline-edit"></div>
        @endif
    
    <a href="#" id="pdfExport" class="float-left text-light btnHover" data-icon="S_Btn_Acrobat" data-tooggle="tooltip" data-placement="top" title="Exportar PDF"><img
            src="{{asset('images/iconos/config/S_Btn_Acrobat_StandBy.svg')}}" alt="" height="30" width="30"></a>
    <a href="#" id="excelExport" data-icon="S_Btn_Excel" class="float-left text-light btnHover" data-tooggle="tooltip" data-placement="top" title="Exportar EXCEL">
        <img src="{{asset('images/iconos/config/S_Btn_Excel_StandBy.svg')}}" alt="" height="30" width="30">
    </a>
    <a href="#" id="wordExport" class="float-left text-light btnHover" data-icon="S_Btn_Word" data-tooggle="tooltip" data-placement="top" title="Exportar WORD">
        <img src="{{asset('images/iconos/config/S_Btn_Word_StandBy.svg')}}" alt="" height="30" width="30">
    </a>
    <a href="#" id="csvExport" class="float-left text-light btnHover" data-icon="S_Btn_CSV" data-tooggle="tooltip" data-placement="top" title="Exportar CVS">
        <img src="{{asset('images/iconos/config/S_Btn_CSV_StandBy.svg')}}" alt="" height="30" width="30">
    </a>
    
        @if(!isset($noCrud))
            <div class="float-left divider-actions-table-inline-edit"></div>
            <a href="#" onclick="moveTable('upOne')" class="float-left text-light btnHover"  data-icon="S_Btn_toUp" data-tooggle="tooltip" data-placement="top" title="Llevar al final"><img
                    src="{{asset('images/iconos/config/S_Btn_toUp_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <a href="#" onclick="moveTable('downOne')" class="float-left text-light btnHover" data-icon="S_Btn_toDown" data-tooggle="tooltip" data-placement="top" title="Subir una posicion"><img
                    src="{{asset('images/iconos/config/S_Btn_toDown_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <a href="#" onclick="moveTable('top')" class="float-left text-light btnHover" data-icon="S_Btn_toHome" data-tooggle="tooltip" data-placement="top" title="Subir inicio"><img
                    src="{{asset('images/iconos/config/S_Btn_toHome_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <a href="#" onclick="moveTable('bottom')" class="float-left text-light btnHover" data-icon="S_Btn_toEnd" data-tooggle="tooltip" data-placement="top" title="Bajar una posicion"><img
                    src="{{asset('images/iconos/config/S_Btn_toEnd_StandBy.svg')}}" alt="" width="30" height="30"></a>
            <div class="float-left divider-actions-table-inline-edit"></div>
        @endif
        
        <div style="display: inline-flex">
            <a href="#" class="float-left" id="boton_cantidad_registros_mostar" data-status="off">
                <div style="height: 30px;width: 30px;color: #333333;font-weight: bold;background: #ffffff;padding-top: 2px;text-align: center;border-radius: 0px;margin-top: 0px;" id="cantidad_por_pagina">15</div>
            </a>
            <div id="cantidad_registros">
                <a href="#">5</a>
                <a href="#">10</a>
                <a href="#">15</a>
                <a href="#">20</a>
                <a href="#">...</a>
            </div>
        </div>
    @endif
    @if(isset($permission))
        <div class="float-left" id="module_selected_container">
            <a href="#" id="module_selected" active="no" data-id=""></a>
            <div id="module_selected_list"></div>
        </div>
    @endif
    {{--Right Side--}}
    <a href="#" class="float-right" id="search_on_table_button"><img src="{{asset('images/iconos/config/S_Btn_Search_StandBy.svg')}}" alt="" width="30" height="30"></a>
    <input type="text" style="width: 200px;margin: 2px;margin-top:3px;height: 25px;margin-right: 0px;border:1px solid #999999;padding: 4px;font-size: 13px;color:#888888;" id="search_on_table" class="float-right">
    @if(isset($permission))
        <a href="#" class="float-right text-light"><img src="" active="no" alt="" width="30" height="30" id="listas_acceso_button"></a>
        <!-- {{asset('images/iconos/config/SVG__CUPET_Btn_AddPerm-StandBy.svg')}} -->
    @endif
</div>
</div>