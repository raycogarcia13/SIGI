var modulos = []; //variable de modulos para utilizar
var personas_chequeadas = [];
var permisos_chequeados = '';
var modulo_actualid = 1;

setInterval(function() {
    $('.check_permission').each(function() {
        var this_element = $(this);
        if (this_element.attr('check') == 'yes') {
            this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-Perm.svg');
        } else {
            this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg');
        }

    });
}, 1500);

function listasAcceso(path) {

    // $('#e').html('');
    // $.each(permisos_chequeados,function(i,value){
    //     // $('#e').append(value.id+' '+value.nombre+'<br>');
    //     permisos_chequeados = permisos_chequeados+'|'+this_permission.attr('data-id')+':'+this_permission.attr('data-name');
    // });

    $('.check_permission').off().on('click', function() {

        var this_element = $(this);

        permisos_chequeados = '';

        if (this_element.attr('check') == 'yes') {
            this_element.attr('check', 'no');
        } else {
            this_element.attr('check', 'yes');
        }

        var todos = [];

        $('.check_permission').each(function() {
            var this_element = $(this);
            if (this_element.attr('check') == 'yes') {
                todos.push(this_element.attr('data-id'));

                this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-Perm.svg');
                permisos_chequeados = permisos_chequeados + '|' + this_element.attr('data-id') + ':' + this_element.attr('data-name');
            } else {
                this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg');
            }
        });

        // updatePermisos(todos, personas_chequeadas);


        $('.edit-permissions').each(function() {
            var this_object_1 = $(this);
            var this_object_1_parent = this_object_1.parent('tr');
            var acum = '';
            var counter = 0;
            var plus = 0;
            var active = 'no';
            if (this_object_1_parent.attr('check') == 'yes') {
                //Reasignando permisos

                var actualizados = mergePermisos(this_object_1.attr('data'), permisos_chequeados);
                this_object_1.attr('data', actualizados);

                this_object_1.html("");
                $.each(this_object_1.attr('data').split('|'), function(i, val) {
                    var perm = val.split(':');
                    if (counter == 0 || val != '')
                        acum = perm[1];

                    if (val != '') {
                        plus++;
                    }

                    counter++;
                });

                var rpf_plus = (plus >= 2) ? plus - 1 : ''; //Saber cuando tiene mas de un permiso
                var rpf = '';

                if (rpf_plus == 0) {
                    active = 'no';
                    rpf = (!acum) ? '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_NO.svg"  width="32" align="left">' + '<span class="permisos"> - Sin permisos</span>' : '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_NO.svg" width="32" align="left"> <span class="permisos"> - ' + acum + '</span>'; //Para mostrar la respuesta final
                    this_object_1.html(rpf);
                } else {
                    active = 'yes';
                    rpf = '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-DER.svg" width="32" align="left"> <span class="permisos"> - ' + acum + ' ' + rpf_plus + '</span>'; //Para mostrar la respuesta final
                    this_object_1.html(rpf);
                    this_object_1.append('<div class="permisos_list"></div>');
                    $.each(this_object_1.attr('data').split('|'), function(i, val) {
                        var perm = val.split(':');
                        if (counter == 0 || val != '') {
                            this_object_1.children('.permisos_list').append('<div><i class="permisos_icon"><img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg' + '"></i><span> - ' + perm[1] + '</span></div>');
                        }
                    });
                }

                this_object_1.attr('active', active); //Establece si el boton esta activo para click
                this_object_1.attr('desplegado', 'no');
            }

        });

        return false;
    });
}

listasAcceso(base_path); //Init

// Reposicionando la lista de permisos
setInterval(function() {
    $("#permission_list").css('top', $('#listas_acceso_button').position().top + 'px');
    $("#permission_list").css('left', $('#listas_acceso_button').position().left - 200 + 'px');
    if ($('#listas_acceso_button').attr("active") == 'yes') {
        $("#permission_list").show();
        $("#listas_acceso_button").attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_AddPerm-On.svg');
    } else {
        $("#permission_list").hide();
        $("#listas_acceso_button").attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_AddPerm-Off.svg');
    }
}, 100);

$('#listas_acceso_button').off().on('click', function() {
    var this_object = $(this);
    personas_chequeadas = [];
    var permisos_chequeados = [];

    $('.check_permission').each(function() {
        var this_permission = $(this);
        //Recorriendo todos los permisos chequeados y guardandolos en una variable
        if (this_permission.attr('check') == 'yes') {
            permisos_chequeados = permisos_chequeados + '|' + this_permission.attr('data-id') + ':' + this_permission.attr('data-name');
        }
    });

    backDropTransparente('adicionar');

    $('table tbody tr').each(function() {
        var this_element = $(this);
        if (this_element.attr('check') == 'yes') {
            //Diciendole al script que si hay persona chequeadas para cambiar los permisos
            personas_chequeadas.push(this_element.attr('data-id'));
        }
    });

    // alert(permisos_chequeados_1.length);
    if (personas_chequeadas.length > 0) {

        if (this_object.attr('active') == 'yes') {
            this_object.attr('active', 'no');
        } else {
            this_object.attr('active', 'yes');
        }
    } else {
        customModal('error', 'es necesario que selecciones al menos un registro', true, '');
    }
    return false;
});

$("#module_selected_container").on('click', function() {

    var this_object = $(this);
    if (this_object.attr('active') == 'yes') {
        this_object.attr('active', 'no');
        $("#module_selected_list").hide();
        this_object.children('#module_selected').children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg');
    } else {
        this_object.attr('active', 'yes');
        $("#module_selected_list").show();
        this_object.children('#module_selected').children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_Off-IZQ.svg');
    }

    return false;
});

// $("#module_selected_list").width($('#module_selected_container').width()-4);

$("#module_selected_list a").on('click', function() {
    $("#module_selected_list").hide();
    $("#module_selected_container").attr('active', 'no');
    return false;
});


//Cagando todos los modulos de la base de datos
$.get(base_path + 'get_modulos', {}, function(response) {
    modulos = response;
    var counter = 0;
    $.each(modulos, function(index, value) {
        $("#module_selected_list").append("<a href='#' data-id='" + value.id + "' data-nombre='" + value.mostrar + "' class='select_modulo'><i> - " + value.mostrar + "</i></a>"); //Adicionando estos modulos al div
        if (counter == 0) {
            $("#module_selected").html('' +
                '<div style="width: 200px;margin: 2px;margin-top:3px;height: 25px;margin-right: 0px;border:1px solid #999999;padding: 4px;padding-top:1px;font-size: 13px;color:#888888;display: inline-flex;background: #ffffff;padding-left: 12px;">' +
                '<i>- ' + value.mostrar + '</i>' +
                '</div>' +
                '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg" alt="" width="30" height="30" class="float-right">').attr('active', 'no').attr('data-id', value.id).attr('data-nombre', value.mostrar);
        }
        counter += 1;
    });

    $(".select_modulo").off().on('click', function() {
        var modulo_actual = $(this);
        modulo_actualid = modulo_actual.attr('data-id')
        $("#module_selected").html('' +
            '<div style="width: 200px;margin: 2px;margin-top:3px;height: 25px;margin-right: 0px;border:1px solid #999999;padding: 4px;padding-top:1px;font-size: 13px;color:#888888;display: inline-flex;background: #ffffff;padding-left: 12px;">' +
            '<i>- ' + modulo_actual.attr('data-nombre') + '</i>' +
            '</div>' +
            '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg" alt="" width="30" height="30" class="float-right">').attr('active', 'no').attr('data-id', modulo_actual.attr('data-id')).attr('data-nombre', modulo_actual.attr('data-nombre'));
        cargarPermisos(modulo_actualid);
    });

});

function cargarPermisos(modulo) {
    //Listas de acceso o permisos
    $.get(base_path + 'get_permisos', { modulo: modulo }, function(response) {
        $("#permission_list").html('');
        $.each(response, function(i, value) {
            $("#permission_list").append('<a href="#"  check="no" class="check_permission" data-name="' + value.nombre + '" data-id="' + value.id + '"><img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg" width="25"> - ' + value.mostrar + '</a>');
        });
        listasAcceso(base_path); //Init
        cargarDatos($("#cantidad_por_pagina").text());
    });

    $('#listas_acceso_button').attr("active", 'no');
}

cargarPermisos(modulo_actualid);

function updatePermisos(permisos, personas) {
    // var token = $('#inline_edit_data').attr('token');
    // var update_method = 'PUT';
    // var data_array = {};
    // data_array._token = token;
    // data_array._method = update_method;
    // data_array.permisos = permisos;
    // for (let i = 0; i < personas.length; i++) {
    //     data_array.id = personas[i];
    //     $.post("/config/permisos", data_array, function(response) {
    //         if (response.success == true)
    //             customModal('success', "SI", true, '', 2500);
    //         else
    //             customModal('error', "No", true, '', 2500);
    //     });
    // }
}

function mergePermisos(actual, nuevos) {
    var todos = [];
    var permisos = actual;
    console.log(actual);
    $.each(actual.split('|'), function(i, val) {
        if (val != 0) {
            var perm = val.split(':');
            todos.push({ id: perm[0], val: perm[1] })
        }
    });

    $.each(nuevos.split('|'), function(i, val) {
        if (val != 0) {
            var act = false;
            var perm = val.split(':');
            for (let i = 0; i < todos.length; i++) {
                if (todos[i].id == perm[0])
                    act = true;
            }
            if (act == false)
                permisos += '|' + perm[0] + ":" + perm[1];
        }
    });

    return permisos;
}

//Table inline edit
function inlineEditInit() {

    var cambio_id = '';

    $('.edit-input').each(function() {
        var this_element = $(this);

        let type = $(this).attr('type-row');
        if (type == 'text' || type == 'number') {
            this_element.html('<input style="display: none;" type="' + type + '"  class="input-text" value="' + this_element.attr('edit-current-value') + '" disabled>');
            this_element.append('<span class="input-span-text">' + this_element.attr('edit-current-value') + '</span>');
        }
    });


    $('.edit-permissions').each(function() {
        var this_object = $(this);
        var acum = '';
        var counter = 0;
        var plus = 0;
        var active = 'no';
        $.each(this_object.attr('data').split('|'), function(i, val) {
            var perm = val.split(':');
            if (counter == 0 || val != '')
                acum = perm[1];

            if (val != '') {
                plus++;
            }

            counter++;
        });

        var rpf_plus = (plus >= 2) ? plus - 1 : ''; //Saber cuando tiene mas de un permiso
        var rpf = '';

        if (rpf_plus == 0) {
            active = 'no';
            rpf = (!acum) ? '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_NO.svg"  width="32" align="left">' + '<span class="permisos"> - Sin permisos</span>' : '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_NO.svg" width="32" align="left"> <span class="permisos"> - ' + acum + '</span>'; //Para mostrar la respuesta final
            this_object.html(rpf);
        } else {
            active = 'yes';
            rpf = '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-DER.svg" width="32" align="left"> <span class="permisos"> - ' + acum + ' ' + rpf_plus + '</span>'; //Para mostrar la respuesta final
            this_object.html(rpf);
            this_object.append('<div class="permisos_list"></div>');
            $.each(this_object.attr('data').split('|'), function(i, val) {
                var perm = val.split(':');
                if (counter == 0 || val != '') {
                    this_object.children('.permisos_list').append('<div><i class="permisos_icon"><img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off-List.svg' + '"></i><span> - ' + perm[1] + '</span></div>');
                }
            });
        }

        this_object.attr('active', active); //Establece si el boton esta activo para click
        this_object.attr('desplegado', 'no');
    });

    setInterval(function() {
        var seleccionados = 0;

        $('table tbody tr').each(function() {
            var this_item = $(this);
            if (this_item.attr('check') == 'yes') {
                seleccionados++;
                this_item.addClass('row-selected');
            } else {
                this_item.removeClass('row-selected');
            }
        });


        $('.edit-permissions img,.edit-permissions .permisos').off().on('click', function() {
            var this_object = $(this).parent('td');
            // alert($('#module_selected').attr('data-id'));

            if (this_object.attr('active') == 'yes') {
                $('.edit-permissions').each(function() {
                    var this_object_1 = $(this);
                    if (this_object_1.attr('data-id') != this_object.attr('data-id')) {
                        if (this_object_1.attr('active') == 'yes') {
                            // if(this_object_1.attr('desplegado')=='no' && this_object_1.attr('active')=='yes'){
                            //     this_object_1.children('img').attr('src',base_path+'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-DER.svg');
                            //     this_object_1.children('.permisos_list').hide();
                            //     this_object_1.children('.permisos').fadeIn('fast');
                            // }else if(this_object_1.attr('desplegado')=='yes' && this_object_1.attr('active')=='yes'){
                            this_object_1.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-DER.svg');
                            this_object_1.children('.permisos_list').hide();
                            this_object_1.children('.permisos').fadeIn('fast');
                            this_object_1.attr('desplegado', 'no');
                            // }else if(this_object_1.attr('desplegado')=='no' && this_object_1.attr('active')=='yes'){
                            //     this_object_1.children('img').attr('src',base_path+'images/iconos/config/SVG__CUPET_Btn_Desplegar_NO.svg');
                            // }
                        }
                    }
                });
                if (this_object.attr('desplegado') == 'yes') {
                    this_object.attr('desplegado', 'no');
                    this_object.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-DER.svg');
                    this_object.children('.permisos_list').hide();
                    this_object.children('.permisos').fadeIn('fast');
                } else {
                    this_object.attr('desplegado', 'yes');
                    this_object.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_Off-DER.svg');
                    this_object.children('.permisos').hide();
                    this_object.children('.permisos_list').fadeIn('fast');
                }
            }

            return false;
        });

        $('.permisos_icon').off().on('mouseenter', function() {
            var this_object = $(this);
            this_object.children('img').attr('src', base_path + 'images/iconos/config/SVG___CUPET_Btn_Delete-Check.svg');
        }).on('mouseleave', function() {
            var this_object = $(this);
            this_object.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg');
        });

        $('.permisos_icon img').off().on('click', function() {
            var this_object = $(this);
            this_object.parent('i').parent('div').remove();
        });

    }, 100);

    $(window).on('keypress', function(e) {
        // if(e.keyCode==13)
    });

    $('.check').off().on('click', function() {

        var this_item = $(this);

        var parent_tr = this_item.parent('td').parent('tr');

        if (parent_tr.attr('check') == 'yes') {
            parent_tr.attr('check', 'no');
            this_item.attr('src', base_path + 'images/iconos/config/S_Btn_selectRow_StandBy.svg');
        } else {
            parent_tr.attr('check', 'yes');
            this_item.attr('src', base_path + 'images/iconos/config/S_Btn_selectRow-InActiveLigth_On.svg');
        }

        return false;
    });

    function removeGuardarCancelar() {
        $('body .cancelar-edicion,body .guardar-edicion').remove();
        $('.edit-element').fadeIn('fast');
    }

    function buttonsActions() {

        $('.cancelar-edicion').off().on('click', function() {
            var this_item = $(this);
            var parent_td = this_item.parent('td').parent('tr').children('td');
            parent_td.children('input').attr('disabled', '').hide();
            parent_td.children('.input-select').attr('disabled', '').hide();


            $('.input-span-text').each(function() {
                $(this).text($(this).parent('td').attr('edit-current-value'));
                $(this).parent('td').children('.input-text').val($(this).parent('td').attr('edit-current-value'));
            });

            parent_td.children('.input-span-select').fadeIn('fast');
            parent_td.children('.input-span-text').fadeIn('fast');
            removeGuardarCancelar();
            return false;
        });

        $('.guardar-edicion').off().on('click', function() {
            // var this_item = $(this);
            // var parent_tr_id = this_item.parent('td').parent('tr').attr('data-id');
            // var parent_td = this_item.parent('td').parent('tr').children('td');
            // var data_array = {};
            // var update_url = this_item.parent('td').parent('tr').parent('tbody').attr('update-path');
            // var update_method = 'PUT';
            // var token = this_item.parent('td').parent('tr').parent('tbody').attr('token');

            // parent_td.children('input').attr('disabled', '').hide();
            // parent_td.children('.input-select').hide();

            // $('.input-text').each(function() {
            //     $(this).parent('td').attr('edit-current-value', $(this).val());
            // });

            // $('.input-select').each(function() {
            //     $(this).parent('td').attr('edit-current-value', $(this).children('a .selected').attr('data-value'));
            // });

            // data_array.id = parent_tr_id;
            // parent_td.each(function() {
            //     var current_value = '';
            //     var data_name = '';
            //     current_value = $(this).attr('edit-current-value');
            //     data_name = $(this).attr('data-name');
            //     if (current_value != null) {
            //         eval("data_array." + data_name + '=' + JSON.stringify(current_value) + '');
            //         // data_array.push([data_name+'|'+current_value])
            //     }
            // });
            // data_array._token = token;
            // data_array._method = update_method;

            // console.log(data_array);

            // $.post(update_url + '/' + data_array.id, data_array, function(response) {
            //     if (response.success == true)
            //         customModal('success', response.message, true, '', 2500);
            //     else
            //         customModal('error', response.message, true, '', 2500);
            // });

            // cambio_id = '';

            // parent_td.children('.input-span-select').fadeIn('fast');
            // parent_td.children('.input-span-text').fadeIn('fast');
            // removeGuardarCancelar();
            // return false;
        });

    };

    //Buttons actions init
    buttonsActions();

    $(".input-span-select").off().on('click', function() {
        var this_item = $(this);
        $('.input-select,.input-text').attr('disabled', '').hide();
        $(".input-span-select,.input-span-text").fadeIn('fast');

        cambio_id = this_item.parent('td').parent('tr').attr('data-id');

        this_item.parent('.edit-select').children('.input-select').removeAttr('disabled').fadeIn('fast');
        removeGuardarCancelar();
        this_item.parent('td').parent('tr').children('.edit-options').append('<a class="cancelar-edicion cancel-square-inline-edit float-right" href="#"></a>');
        this_item.parent('td').parent('tr').children('.edit-options').append('<a class="guardar-edicion update-square-inline-edit float-right" href="#"></a>');
        this_item.parent('td').parent('tr').children('.edit-options').children('.edit-element').hide();

        $(".input-select").each(function() {
            var this_element_i = $(this);
            var this_element_parent_i = this_element_i.parent('td');
            this_element_i.width(this_element_parent_i.width() + 2);
        });
        backDropTransparente('adicionar')
        buttonsActions()
    });

    $(".input-span-text").off().on('click', function() {
        var this_item = $(this);
        $('.input-text,.input-select').attr('disabled', '').hide();
        $(".input-span-text,.input-span-select").fadeIn('fast');


        cambio_id = this_item.parent('td').parent('tr').attr('data-id');

        this_item.parent('td').children('.input-text').removeAttr('disabled').fadeIn('fast');
        removeGuardarCancelar();
        this_item.parent('td').parent('tr').children('.edit-options').append('<a class="cancelar-edicion cancel-square-inline-edit float-right" href="#"></a>');
        this_item.parent('td').parent('tr').children('.edit-options').append('<a class="guardar-edicion update-square-inline-edit float-right" href="#"></a>');
        $('.edit-options').children('.edit-element').hide();
        this_item.hide();
        buttonsActions();
    });



    $('.edit-element').off().on('click', function() {

        var this_item = $(this);
        var parent_tr = this_item.parent('td').parent('tr');
        var parent_first_edit = parent_tr.children('.fist-edit');

        $('.edit-input').children('input').attr('disabled', 'disabled').hide();
        $('.edit-select').children('select').attr('disabled', 'disabled').hide();
        $('.input-span-select').fadeIn('fast');
        $('.input-span-text').fadeIn('fast');

        $('.input-select').hide().attr('disabled', '');
        $('.input-span-select').fadeIn('fast');
        $('.edit-options').children('.cancelar-edicion').remove();
        $('.edit-options').children('.guardar-edicion').remove();
        $('.edit-element').fadeIn('fast');

        parent_first_edit.children('input').removeAttr('disabled', '').fadeIn('fast');
        parent_first_edit.children('.input-select').removeAttr('disabled', '').fadeIn('fast');

        parent_first_edit.children('.input-span-select').hide();
        parent_first_edit.children('.input-span-text').hide();

        parent_tr.children('.edit-options').append('<a class="cancelar-edicion cancel-square-inline-edit float-right" href="#"></a>');
        parent_tr.children('.edit-options').append('<a class="guardar-edicion update-square-inline-edit float-right" href="#"></a>');

        buttonsActions();

        this_item.hide();

        return false;
    });

    $('.input-select a').off().on('click', function() {
        var this_element = $(this);
        var this_element_parent_td = this_element.parent('div').parent('.edit-select');
        var this_element_parent_children_input = this_element.parent('div').parent('.edit-select').children('select');
        this_element_parent_td.children('.input-span-select').html('<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg' + '" width="20">' + this_element.text());
        this_element_parent_td.attr('edit-current-value', this_element.data('value'));
        this_element_parent_children_input.html('<option selected value="' + this_element.data('value') + '">' + this_element.data('value') + '</option>');
        this_element_parent_td.children('.input-select').hide();
        this_element.parent('.input-select').children('a').removeClass('selected');
        this_element.parent('.input-select').children('a').children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg');
        this_element.addClass('selected');
        this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-List.svg');
        this_element_parent_td.children('.input-span-select').fadeIn('fast');
        backDropTransparente('eliminar')
        return false;
    });

    //Buscador de la tabla
    $("#search_on_table").on('focus', function() {
        $("#search_on_table_button").children('img').attr('src', base_path + 'images/iconos/config/S_Btn_Search_On.svg')
    }).on('blur', function() {
        // $("#search_on_table_button").children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Search-2-Off.svg')
    });
};