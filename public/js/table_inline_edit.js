//Table inline edit
function changeF(item) {
    // console.log($('#'+item).value());
    let title=""
    $.each($('#'+item).children('option'),function(i,value){
        if($(value).prop('selected'))
            title=$(value).text()
    });
    // console.log(title);
    let el=$('#'+item).parent().children('span').html(title);
    // console.log(el);
}

function inlineEditInit() {

    var cambio_id = '';

    $('.edit-input').each(function() {
        var this_element = $(this);

        // INICIO cambios MICHEL
        // 20/01/2020 agregando condiciones para mostrar los checkbox

        var patron = /^d*$/;


        let type = $(this).attr('type-row');
        if (type == 'text' || type == 'number') {
            this_element.html('<input style="display: none;" type="' + type + '"  class="input-text" value="' + this_element.attr('edit-current-value') + '" disabled>');
            this_element.append('<span class="input-span-text">' + this_element.attr('edit-current-value') + '</span>');
        }
        if (type == 'checkbox') {
            if (this_element.attr('edit-current-value') == 'true') {
                this_element.html('<input style="display: block;" type="' + type + '"  class="input-checkbox" value="' + this_element.attr('edit-current-value') + '" checked="checked">');
                //this_element.append('<span class="input-span-select">' + this_element.attr('edit-current-value') + '</span>');
            } else {
                this_element.html('<input style="display: block;" type="' + type + '"  class="input-checkbox" value="' + this_element.attr('edit-current-value') + '" >');
                //this_element.append('<span class="input-span-select">' + this_element.attr('edit-current-value') + '</span>');
            }
        }
        if (type == 'select') {
            let id=$(this).attr('data-name');
            let options = $(this).attr('options').split('|');
            let select = '<select onchange="changeF(id)" class="input-text" style="display:none" id="' + $(this).attr('data-name') + '" name="' + $(this).attr('data-name') + '">';
            for (let i = 0; i < options.length; i++) {
                let ds = options[i].split(':');
                let sel = (ds[0] == $(this).attr('edit-current-value')) ? 'selected' : '';
                select += '<option ' + sel + ' value="' + ds[1] + '">' + ds[0] + '</option>';
            }
            select += '</select>';
            this_element.html(select);
            this_element.append('<span class="input-span-text">' + this_element.attr('edit-current-value') + '</span>');
        }


        //this_element.html('<input style="display: none;" type="text"  class="input-text" value="' + this_element.attr('edit-current-value') + '" disabled>');
        //this_element.append('<span class="input-span-text">' + this_element.attr('edit-current-value') + '</span>');

        // Fin Cambios Michel
        //
    });

    // $('.edit-select').each(function() {

    //     var this_element = $(this);
    //     var current_value = this_element.attr('edit-current-value');
    //     var dataItems = this_element.attr('data');
    //     var labelItems = this_element.attr('label').split('|');

    //     $(this).html('<div style="display:none;" class="input-select"></div>');

    //     let id = (this_element.attr('data-id')) ? 'id="' + this_element.attr('data-id') + '"' : ''

    //     $.each(dataItems.split('|'), function(i, value) {
    //         var selected = (current_value == value) ? 'selected' : '';
    //         var selected_check = (current_value == value) ? base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-List.svg' : base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg';
    //         if (current_value == value)
    //             this_element.append('<span class="input-span-select"><img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg' + '" alt="" width="20">' + labelItems[i] + '</span>');
    //         // SetearInputs
    //         this_element.children('.input-select').append("<a href='' data-value='" + value + "' class='" + selected + "'><img src='" + selected_check + "' width='15' align='left'>" + labelItems[i] + "</a>");
    //     });

    //     this_element.append(`<select style="display: none;" ` + id + ` name="` + this_element.data('name') + `"><option selected value="` + current_value + `">` + current_value + `</option></select>`)

    // });

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

        $("#quantity_selected").text(seleccionados);

        if (estadoUsuarioSeleccionado == 1) {
            if (seleccionados > 0) {
                $("#delete_records").children('img').attr('src', base_path + 'images/iconos/config/' + $("#delete_records").data('icon') + '_On.svg')
                $("#quantity_selected").show()
            } else {
                $("#delete_records").children('img').attr('src', base_path + 'images/iconos/config/' + $("#delete_records").data('icon') + '_Off.svg')
                $("#quantity_selected").hide()
            }
        }

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
            //parent_td.children('input').attr('disabled', '').hide();
            //parent_td.children('.input-select').attr('disabled', '').hide();


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
            var this_item = $(this);
            var parent_tr_id = this_item.parent('td').parent('tr').attr('data-id');
            var parent_td = this_item.parent('td').parent('tr').children('td');
            var data_array = {};
            var update_url = this_item.parent('td').parent('tr').parent('tbody').attr('update-path');
            var update_method = 'PUT';
            var token = this_item.parent('td').parent('tr').parent('tbody').attr('token');

            //parent_td.children('input').attr('disabled', '').hide();
            //parent_td.children('.input-select').hide();

            $('.input-text').each(function() {
                $(this).parent('td').attr('edit-current-value', $(this).val());
            });

            $('.input-select').each(function() {
                $(this).parent('td').attr('edit-current-value', $(this).children('a .selected').attr('data-value'));
            });

            data_array.id = parent_tr_id;
            parent_td.each(function() {
                var current_value = '';
                var data_name = '';
                current_value = $(this).attr('edit-current-value');
                data_name = $(this).attr('data-name');
                if (current_value != null) {
                    eval("data_array." + data_name + '=' + JSON.stringify(current_value) + '');
                    // data_array.push([data_name+'|'+current_value])
                }
            });
            data_array._token = token;
            data_array._method = update_method;

            //console.log(data_array);

            $.post(update_url + '/' + data_array.id, data_array, function(response) {
                if (response.success == true)
                    customModal('success', response.message, true, '', 2500);
                else
                    customModal('error', response.message, true, '', 2500);
            });

            cambio_id = '';

            parent_td.children('.input-span-select').fadeIn('fast');
            parent_td.children('.input-span-text').fadeIn('fast');
            removeGuardarCancelar();
            return false;
        });

        $('.input-select').off().on('change', function() {
            var this_item = $(this);
            alert('si');
            this_item.parent('td').children('.input-span-select').text(this_item.val());
        });

        $('.input-text').off().on('keyup', function() {
            var this_item = $(this);
            this_item.parent('td').children('.input-span-text').text(this_item.val());
        });


        //Para eliminar los registros
        function deleteRecords() {
            // alert('ahora si a eliminar');
            var delete_path = $('#inline_edit_data').attr('delete-path');
            delete_path += '/1'
            var token = $('#inline_edit_data').attr('token');
            var ids = [];

            $('table tbody tr').each(function() {
                var this_item = $(this);
                if (this_item.attr('check') == 'yes') {
                    ids.push(this_item.attr('data-id'));
                    this_item.remove();
                }
            });

            $.post(delete_path, { _token: token, _method: 'DELETE', ids: ids }, function(response) {
                let del = '';
                let cantd = 0;
                let inact = '';
                let canti = 0;
                $.each(response, function(i, data) {
                    if (i == 'deletes' && data.length > 0) {
                        cantd = data.length;
                        del += '<ul>'
                        $.each(data, function(i, val) {
                            del += '<li>' + val.nombre + '</li>';
                        })
                        del += '</ul>';
                    } else if (i == 'disabled' && data.length > 0) {
                        canti = data.length;
                        inact += '<ul>'
                        $.each(data, function(i, val) {
                            inact += '<li>' + val.nombre + '</li>';
                        })
                        inact += '</ul>';
                    }
                })
                let msg = '';
                if (del != '' && inact == '')
                    msg = 'Eliminación satisfactoria';
                else if (del == '' && inact != '')
                    msg = 'Información inactivada';
                else if (del != '' && inact != '') {
                    msg += 'Eliminación satisfactoria:<br>' + del;
                    msg += 'Elementos desactivados:<br>' + inact;
                } else {
                    msg = "No se eliminó  ninguna información";
                }
                customModal('success', msg, false, '');
                refreshData();

            });
        }

        $("#delete_records").off().on('click', function() {
            if ($("#quantity_selected").text() > 0) {
                customModal('confirm', 'Estas seguro que deseas eliminar los registros seleccionados', false, deleteRecords);
            }
            return false;
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

    $('#reactivarAction').off().on('click', function() {
        // var delete_path = $('#inline_edit_data').attr('delete-path');
        // delete_path += '/1'
        var token = $('#inline_edit_data').attr('token');
        var ids = [];

        $('table tbody tr').each(function() {
            var this_item = $(this);
            if (this_item.attr('check') == 'yes') {
                ids.push(this_item.attr('data-id'));
            }
        });

        if (ids.length > 0) {
            let msg;
            if (ids.length == 1)
                msg = "el registro seleccionado";
            else
                msg = "los registros seleccionados";
            customModal('confirm', 'Estas seguro que deseas reactivar ' + msg, false, function() {
                $.post(reactivar, { ids: ids, _token: token, _method: 'PUT' }, function(resp) {
                    refreshData();
                    customModal('success', "Reactivación satisfactoria", true, '');
                })
            });
        }
    })


    $('.edit-element').off().on('click', function() {

        var this_item = $(this);
        var parent_tr = this_item.parent('td').parent('tr');
        var parent_first_edit = parent_tr.children('.fist-edit');

        //$('.edit-input').children('input').attr('disabled', 'disabled').hide();
        //$('.edit-select').children('select').attr('disabled', 'disabled').hide();
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
