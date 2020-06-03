$('.edit-select').each(function() {
    var this_element = $(this);
    var current_value = this_element.attr('edit-current-value');
    var dataItems = this_element.attr('data');
    var labelItems = this_element.attr('label').split('|');

    $(this).html('<div style="display:none;" class="input-select"></div>');

    let id = (this_element.attr('data-id')) ? 'id="' + this_element.attr('data-id') + '"' : '';

    $.each(dataItems.split('|'), function(i, value) {
        var selected = (current_value == value) ? 'selected' : '';
        var selected_check = (current_value == value) ? base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-List.svg' : base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_Off.svg';
        if (current_value == value)
            this_element.append('<span class="input-span-select"><img src="' + base_path + 'images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg' + '" alt="" width="20">' + labelItems[i] + '</span>');
        // SetearInputs
        this_element.children('.input-select').append("<a href='' data-value='" + value + "' class='" + selected + "'><img src='" + selected_check + "' width='15' align='left'>" + labelItems[i] + "</a>");
    });

    this_element.append(`<select style="display: none;" ` + id + ` name="` + this_element.data('name') + `"><option selected value="` + current_value + `">` + current_value + `</option></select>`);
});

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
    backDropTransparente('adicionar');
    buttonsActions();
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
    backDropTransparente('eliminar');
    return false;
});
// this_element.addClass('selected');
// this_element.children('img').attr('src', base_path + 'images/iconos/config/SVG__CUPET_Btn_Check_On-List.svg');
// this_element_parent_td.children('.input-span-select').fadeIn('fast');
// backDropTransparente('eliminar')
// return false;
// });

$('.edit-check').each(function() {

    let thisObject = $(this);

    let id = (thisObject.data('id')) ? ` id="` + thisObject.data('id') + `"` : ``;

    let name = (thisObject.data('name')) ? ` name="` + thisObject.data('id') + `"` : ``;

    let checked = (thisObject.data('checked') == 'on') ? `checked="checked"` : ``;

    let label = thisObject.data('label');

    let icon = (thisObject.data('checked') == 'on') ? `<img src="` + iconCheckOn + `" width="15" style="margin-right: 7px;">` + label : `<img src="` + iconCheckOff + `" width="15" style="margin-right: 7px;">` + label;

    thisObject.append(`<div class="button">` + icon + `</div>`);

    thisObject.append(`<input style="display: none;" type="checkbox" ` + name + ` ` + id + ` ` + checked + ` >`);

    let button = thisObject.children('.button');

    button.off().on('click', function() {

        let localButton = $(this);

        if (thisObject.data('checked') == 'on') {
            thisObject.data('checked', 'off');
            thisObject.children('input').removeAttr('checked');
            localButton.html(`<img src="` + iconCheckOff + `" width="15" style="margin-right: 7px;">` + label);
        } else {
            thisObject.data('checked', 'on')
            thisObject.children('input').attr('checked', 'checked');
            localButton.html(`<img src="` + iconCheckOn + `" width="15" style="margin-right: 7px;">` + label);
        }

        return false;
    })

})
