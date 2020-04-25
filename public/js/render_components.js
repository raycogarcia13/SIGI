function renderComponents() {

    const iconCheckOff = base_path + "images/iconos/config/S_Btn_selectRow_StandBy.svg"
    const iconCheckOn = base_path + "images/iconos/config/S_Btn_selectRow-InActiveDark_On.svg"
    const desplegar = base_path + "images/iconos/config/SVG__CUPET_Btn_Desplegar_On-IZQ.svg"
    const desplegarOff = base_path + "images/iconos/config/SVG__CUPET_Btn_Desplegar_Off-IZQ.svg"

    // Cleaning All
    $('.edit-select,.edit-check,.edit-color-picker').html("")

    $('.edit-select').each(function() {

        let object = $(this)
        let label = object.attr('label') ? object.attr('label') : 'Selecciona';
        let currentValue = (object.attr('current-value')) ? `<a href="#" class="current-selected" value="` + object.attr('current-value').split(':')[1] + `"><img src="` + desplegar + `" width="15" style="margin-right: 7px;">` + object.attr('current-value').split(':')[0] + `</a>` : `<a href="#" class="current-selected" value=""><img src="` + desplegar + `" width="15" style="margin-right: 7px;">` + label + `:</a>`
        let id = (object.data('id')) ? 'id="' + object.data('id') + '"' : ''

        object.append(`<div class="input-select"></div>`)
        object.append(currentValue)
        object.append(`<select ` + id + ` style="display:none;" name="` + object.data('name') + `"></select>`)

        let dataItems = object.data('i')
        let inputSelect = object.children('.input-select')
        let currentSelected = object.children('.current-selected')
        let select = object.children('select')

        if (object.attr('current-value'))
            select.append(`<option selected="selected" value="` + object.attr('current-value').split(':')[1] + `">` + object.attr('current-value').split(':')[0] + `</option>`)

        inputSelect.hide()

        $.each(dataItems.split('|'), function(i, index) {
            if (index) {

                let label = index.split(':')[0]
                let valor = index.split(':')[1]

                inputSelect.append(`<a href="#" data-value="` + valor + `" data-label="` + label + `" ><img src="` + desplegarOff + `" width="15" style="margin-right: 7px;">` + label + `</a>`)

            }
        })

        object.off().on('click', function() {
            // mostrar todos los input select
            $('.input-select').hide()
            backDropTransparente('adicionar')
            inputSelect.fadeIn('fast')
            return false
            return false
        })

        object.children('.input-select').children('a').off().on('click', function() {
            backDropTransparente('eliminar')
            alert('clcik');
            let thisObject = $(this)
            select.html("")
            select.append(`<option selected="selected" value="` + thisObject.data('value') + `">` + thisObject.data('label') + `</option>`)
            currentSelected.html(`<img src="` + desplegar + `" width="15" style="margin-right: 7px;">` + thisObject.data('label'))
            currentSelected.at
            return falsetr('value', thisObject.data('value'));
            inputSelect.hide()
            return false
        })

    })


    $('.edit-check').each(function() {

        let thisObject = $(this)

        let id = (thisObject.data('id')) ? ` id="` + thisObject.data('id') + `"` : ``

        let name = (thisObject.data('name')) ? ` name="` + thisObject.data('id') + `"` : ``

        let checked = (thisObject.data('checked') == 'on') ? `checked="checked"` : ``

        let label = thisObject.data('label')

        let icon = (thisObject.data('checked') == 'on') ? `<img src="` + iconCheckOn + `" width="15" style="margin-right: 7px;">` + label : `<img src="` + iconCheckOff + `" width="15" style="margin-right: 7px;">` + label

        thisObject.append(`<div class="button">` + icon + `</div>`)

        thisObject.append(`<input style="display: none;" type="checkbox" ` + name + ` ` + id + ` ` + checked + ` >`)

        let button = thisObject.children('.button')

        button.off().on('click', function() {

            let localButton = $(this)

            if (thisObject.data('checked') == 'on') {
                thisObject.data('checked', 'off')
                thisObject.children('input').removeAttr('checked')
                localButton.html(`<img src="` + iconCheckOff + `" width="15" style="margin-right: 7px;">` + label)
            } else {
                thisObject.data('checked', 'on')
                thisObject.children('input').attr('checked', 'checked')
                localButton.html(`<img src="` + iconCheckOn + `" width="15" style="margin-right: 7px;">` + label)
            }

            return false
        })

    })

    $('.edit-color-picker').each(function() {

        let thisObject = $(this)

        let id = (thisObject.data('id')) ? ` id="` + thisObject.data('id') + `"` : ``

        let name = (thisObject.data('name')) ? ` name="` + thisObject.data('id') + `"` : ``

        let value = (thisObject.data('value')) ? ` value="` + thisObject.data('value') + `"` : ``

        thisObject.append(`
        <div class="input-group colorpicker-component color-picker mb-3">
            <input type="text" class="form-control" ` + id + ` ` + name + ` ` + value + ` placeholder="Ej: #cecece"/>
            <div class="input-group-addon input-group-append">
            <span class="input-group-text bg-transparent text-light rounded-0">
            <div class="fa fa-eyedropper" style="text-shadow: 0 2px 2px rgba(0,0,0,0.2)"></div>
            </span>
            </div>
        </div>
        `)

        let thisScuare = thisObject.children('.scuare-color');
        let thisInput = thisObject.children('.color-picker');

        // if(value){
        //     thisScuare.attr('style','width:27px;height:27px;float:left;background:'+thisObject.data('value')+';')
        // }

        // thisInput.off().on('keydown',function(){
        //     thisScuare.attr('style','width:27px;height:27px;float:left;background:'+thisObject.data('value')+';')
        // })

        // $('.color-picker').colorpicker({
        //     function(e){
        //         alert(e)
        //     }
        // })

        $('.color-picker').colorpicker();

    })

    setInterval(() => {
        $(".input-select").each(function() {
            let thisObject = $(this)
            thisObject.width(thisObject.parent().width())
        })
    }, 1000)

}