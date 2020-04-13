// //Init show-side-bar
// if(!localStorage.getItem('show-side-bar')){
//     localStorage.setItem('show-side-bar','off');
// }
//
// $("#btn-nav-change-status").off().on('click',function(){
//     var button = $(this);
//     button.children('div#b1').toggleClass('bars-animate-arrow-top');
//     button.children('div#b2').toggleClass('bars-animate-arrow-middle');
//     button.children('div#b3').toggleClass('bars-animate-arrow-bottom');
//     $(".main-sidebar").toggleClass('main-sidebar-expand');
//
//     if(localStorage.getItem('show-side-bar')=='off'){
//         localStorage.setItem('show-side-bar','on');
//     }else{
//         localStorage.setItem('show-side-bar','off');
//     }
//     return false;
// });
//
// setInterval(function(){
//     if (localStorage.getItem('show-side-bar')=='on'){
//         $("#btn-nav-change-status").children('div#b1').addClass('bars-animate-arrow-top');
//         $("#btn-nav-change-status").children('div#b2').addClass('bars-animate-arrow-middle');
//         $("#btn-nav-change-status").children('div#b3').addClass('bars-animate-arrow-bottom');
//         $(".main-sidebar").addClass('main-sidebar-expand');
//     } else{
//         $("#btn-nav-change-status").children('div#b1').removeClass('bars-animate-arrow-top');
//         $("#btn-nav-change-status").children('div#b2').removeClass('bars-animate-arrow-middle');
//         $("#btn-nav-change-status").children('div#b3').removeClass('bars-animate-arrow-bottom');
//         $(".main-sidebar").removeClass('main-sidebar-expand');
//     }
// },100);
//
// $(".central-links").off().on('click',function(){
//     var name = $(this).children('div.text').text();
//     $("#id_modulo_login").html(name);
//     $("#login-modal").modal('show');
//     return false;
// }).mouseenter(function(){
//     var child_img = $(this).children('img');
//     child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-hover'));
// }).mouseleave(function(){
//     var child_img = $(this).children('img');
//     child_img.attr('src',$('body').attr('path')+'/images/iconos/generales/'+child_img.attr('src-default'));
// });
//
// $(document).ready(function(){
//    $('html,body,.modal').niceScroll({
//        cursorcolor:'#FE0000',
//        zindex:'100000000',
//        borderRadius:'0px'
//    });
// });

//Aditional things

//Init show-side-bar
if (!localStorage.getItem('show-side-bar')) {
    localStorage.setItem('show-side-bar', 'off');
}

//Change status nacvar button and animate
$("#btn-nav-change-status").unbind().on('click', function() {
    var button = $(this);
    button.children('div#b1').toggleClass('bars-animate-arrow-top');
    button.children('div#b2').toggleClass('bars-animate-arrow-middle');
    button.children('div#b3').toggleClass('bars-animate-arrow-bottom');
    $(".main-sidebar").toggleClass('main-sidebar-expand');
    $(".menu_h").toggle();
    if ($(".main-sidebar").hasClass('main-sidebar-expand')) {
        backDropTransparente('adicionar')
    } else {
        backDropTransparente('eliminar')
    }
    return false;
});

// cargarBackdrop Para ocular elementos
function backDropTransparente(estado) {

    $("#backdrop_cupet_transparent").remove();

    if (estado == 'adicionar')
        $('body').append('<div id="backdrop_cupet_transparent"></div>');
    else if (estado == 'eliminar')
        $("#backdrop_cupet_transparent").remove();

    $('#backdrop_cupet_transparent').off().on('click', function() {
        $("#lista_trabajadores_invitados,#cantidad_registros,#switch_list").fadeOut('fast');
        $("#boton_cantidad_registros_mostar,#boton_switch").attr('data-status', 'off');
        $('#backdrop_cupet_transparent').remove()
        $("#lista_modulos").removeClass('open').addClass('close')
        $(".main-sidebar").removeClass('main-sidebar-expand');
        $("#btn-nav-change-status").children('div#b1').removeClass('bars-animate-arrow-top');
        $("#btn-nav-change-status").children('div#b2').removeClass('bars-animate-arrow-middle');
        $("#btn-nav-change-status").children('div#b3').removeClass('bars-animate-arrow-bottom');
        $("#listas_acceso_button").attr('active', 'no')
        $(".input-span-select").show()
        $(".input-select").hide()
    });
}

$("#show_more_about,#show_less_about").on('click', function() {
    $('#modal_dialog_about').toggleClass('modal-dialog-expand');
    $('#details_about').toggle('slideUp');
    return false;
});

function setBasicClickEvents() {
    $('#backdrop_cupet_modal').off().on('click', function() {
        $('.modal-content-cupet').fadeOut('fast');
        $(this).fadeOut('fast', function() {
            $(this).remove();
        });
    });

    $(".cmc").off().on('click', function() {
        $('#backdrop_cupet_modal').fadeOut('fast', function() {
            $(this).remove();
        });
        $('.modal-content-cupet').fadeOut('fast');
        return false;
    });

    $(".btnHover").on('mouseenter', function() {
        $(this).children('img').attr('src', base_path + 'images/iconos/config/' + $(this).data('icon') + '_On.svg')
    }).on('mouseleave', function() {
        $(this).children('img').attr('src', base_path + 'images/iconos/config/' + $(this).data('icon') + '_StandBy.svg')
    })

}

setBasicClickEvents();

setInterval(setBasicClickEvents(), 100);

function toCsv(rows) {
    // const rows = [
    //     ["name1", "city1", "some other info"],
    //     ["name2", "city2", "more info"]
    // ];

    let csvContent = "data:text/csv;charset=utf-8,";

    rows.forEach(function(rowArray) {
        let row = rowArray.join(",");
        csvContent += row + "\r\n";
    });

    var encodedUri = encodeURI(csvContent);
    window.open(encodedUri);
}

function toWord(element, filename = '') {
    var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    var postHtml = "</body></html>";
    // var html = preHtml + document.getElementById(element).innerHTML + postHtml;
    var html = preHtml + element + postHtml;

    var blob = new Blob(['ufeff', html], {
        type: 'application/msword'
    });

    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

    // Specify file name
    filename = filename ? filename + '.doc' : 'document.doc';

    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = url;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }

    document.body.removeChild(downloadLink);
}

function toExcel(data) {
    // var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    // var textRange;
    // var j = 0;
    // tab = document.getElementById('headerTable'); // id of table

    // for (j = 0; j < tab.rows.length; j++) {
    //     tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    //     //tab_text=tab_text+"</tr>";
    // }

    // tab_text = tab_text + "</table>";
    // tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    // tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    // tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    sa = window.open('data:application/msexcel,' + encodeURIComponent(data), "Listado", null);

    return (sa);
}

function toPdf(data, title) {
    var doc = new jsPDF('p', 'pt', 'letter');
    var elementHTML = data;
    doc.autoTable(data.header, data.body, {
        theme: 'grid',
        margin: {
            top: 60
        },
        beforePageContent: function(data) {
            doc.text(title, 40, 30);
        }
    });
    doc.save('SIGI-' + title + '.pdf');
}

function moveElements(data, action, token, table, attr) {
    let uri = '/moveElements';
    $.post(uri, { action: action, _token: token, table: table, attr: attr, ids: data }, function(resp) {
        refreshData();
    })
    return true;
}

//Navegador flotante
$("#sigi_button").on('click', function() {
    if ($("#lista_modulos").hasClass('close')) {
        backDropTransparente('adicionar')
        $("#lista_modulos").addClass('open').removeClass('close')
    } else {
        backDropTransparente('eliminar')
        $("#lista_modulos").addClass('close').removeClass('open')
    }
    return false
})

//Inhabilitar elementos
function inHabilitar() {
    $('.lock').each(function() {
        $(this).children('.cover-lock').remove()
    })
    $('.lock').prepend('<div class="cover-lock"></div>')
}

/*Serializar un div como si fuera un formulario
uso
let variable = serializeDiv($('#formularioDiv'))
--Con esto ya capturamos todos los datos dentro de un div y lo serializamos para enviarlo como si fuese un formulario
*/
function serializeDiv($div, serialize_method) {
    // Accepts 'serialize', 'serializeArray'; Implicit 'serialize'
    serialize_method = serialize_method || 'serialize';

    // Unique selector for wrapper forms
    var inner_wrapper_class = 'any_unique_class_for_wrapped_content';

    // Wrap content with a form
    $div.wrapInner("<form class='" + inner_wrapper_class + "'></form>");

    // Serialize inputs
    var result = $('.' + inner_wrapper_class, $div)[serialize_method]();

    // Eliminate newly created form
    $('.script_wrap_inner_div_form', $div).contents().unwrap();

    // Return result
    return result;
}

$("#boton_charts").off().on('click', function() {
    let ruta = $(this).data('url')
    $("#modal-editable").modal('show')
    $("#contenidoModalEditable").load(ruta)
    return false
})

$("#boton_switch").off().on('click', function() {
    if ($(this).data('status') == 'off') {
        $(this).attr('data-status', 'on');
        $("#switch_list").fadeIn('fast');
        backDropTransparente('adicionar');
    } else {
        $(this).attr('data-status', 'off');
        $("#switch_list").fadeOut('fast');
        backDropTransparente('eliminar');
    }
    return false;
});