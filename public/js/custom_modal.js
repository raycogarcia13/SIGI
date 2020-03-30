function customModal(modal_type, content_middle = '', auto_hide = false, confirm_path = '', hide_delay = 3000) {
    //Eliminar la instancia y crear uno nuevo si existe
    $(".modal-content-cupet").remove();

    var footer = '';
    var icon = '';
    var class_modal = '';

    if (modal_type == 'success') {
        footer = '<a href="#" id="confirm_modal_cupet_action"></a>';
        icon = '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Ico_Ok.svg" class="img-fluid">';
        class_modal = 'bg-success';
    }

    if (modal_type == 'error') {
        footer = '<a href="#" id="confirm_modal_cupet_action"></a></a>';
        icon = '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Ico_Warning.svg" class="img-fluid">';
        class_modal = 'bg-danger';
    }

    if (modal_type == 'confirm') {
        footer = '<a href="#" id="confirm_modal_cupet_action"></a> <a href="#" id="cancel_modal_cupet_action"></a>';
        icon = '<img src="' + base_path + 'images/iconos/config/SVG__CUPET_Ico_Warning.svg" class="img-fluid">';
        class_modal = 'bg-confirm';
    }

    $('body').append("<div id=\"backdrop_cupet_modal\"></div>");
    $('body').prepend("<div class=\"modal-content-cupet\">\n" +
        "    <div class=\"modal-cupet-body " + class_modal + "\">\n" +
        "        <div class=\"modal-cupet-content-body\">\n" +
        '<div class="row"><div class="col-md-3">' + icon + '</div><div class="col-md-9">' + content_middle + "</div></div>" +
        "        </div>\n" +
        "        <div class=\"modal-cupet-content-footer\">" + footer + "</div>\n" +
        "    </div>\n" +
        "</div>");

    if (modal_type == 'success' || modal_type == 'error') {
        $("#confirm_modal_cupet_action,#backdrop_cupet_modal").off().on('click', function() {
            $("#backdrop_cupet_modal").fadeOut('fast', function() {
                $("#backdrop_cupet_modal").remove();
            });
            $(".modal-content-cupet").fadeOut('fast', function() {
                $(".modal-content-cupet").remove();
            });
        });
    }

    if (modal_type == 'confirm') {
        $("#cancel_modal_cupet_action,#backdrop_cupet_modal").off().on('click', function() {
            $("#backdrop_cupet_modal").fadeOut('fast', function() {
                $("#backdrop_cupet_modal").remove();
            });
            $(".modal-content-cupet").fadeOut('fast', function() {
                $(".modal-content-cupet").remove();
            });
            return false;
        });
        $("#confirm_modal_cupet_action").off().on('click', confirm_path);
    }

    $(".modal-content-cupet").fadeIn('fast');
    if (auto_hide == true) {
        setTimeout(function() {
            $(".modal-content-cupet").fadeOut('fast', function() {
                $(".modal-content-cupet").remove();
                $("#backdrop_cupet_modal").remove();
            });
        }, hide_delay);
    }

}
