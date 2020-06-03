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
        $("#listas_acceso_button").attr('active', 'no');
        $(".input-span-select").show();
        $(".input-select").hide();
        $("#switch_list").hide();
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


function toPdf(data, title, dpto = null, email = null) {

    // Para crear el footer con el paginado y algo mas
    const addFooters = doc => {
      const pageCount = doc.internal.getNumberOfPages()

      doc.setFont('helvetica', 'italic')
      doc.setFontSize(8)
      var sigi = new Image();
      sigi.src = URLactual + '/images/SVG_CUPET_ID_SIGI.jpg';
      for (var i = 1; i <= pageCount; i++) {
        doc.setPage(i);
        doc.setDrawColor(10, 98, 47);
        doc.line(40, doc.internal.pageSize.height - 20, 750, doc.internal.pageSize.height - 20, 'S');
        doc.text('Página ' + String(i) + ' de ' + String(pageCount), 40, doc.internal.pageSize.height - 10, {
          align: 'left'
        })

        // Adicionando un texto e imagen al final derecha del footer
        // doc.addImage(sigi, 'JPG', doc.internal.pageSize.width - 70, doc.internal.pageSize.height - 18, 30, 15);
        // doc.text('Grupo de Progamación Los Cucos', doc.internal.pageSize.width - 200, doc.internal.pageSize.height - 10)

      }
    }

    if(dpto == null )
    {
        dpto = "Empresa Comercializadora de Combustibles Isla de la Juventud.";
    } else {
        dpto = "Empresa Comercializadora de Combustibles Isla de la Juventud. " + dpto + ".";
    }

    if(email == null )
    {
        email = "Calle 13 final, Sierra Caballos. Teléfono: 46325111.";
    } else {
        email = "Calle 13 final, Sierra Caballos. Teléfono: 46325111. Email: " + email + ".";
    }

    var URLactual = location.origin;
    var doc = new jsPDF('l', 'pt', 'letter');
    var elementHTML = data;
    var img = new Image();
    img.src = URLactual + '/images/ico-_CUPET_ID%20CUPET.png';
    doc.addImage(img, 'PNG', doc.internal.pageSize.width /2 - 20, 20, 70, 50);
    doc.setFontStyle('arial');
    doc.setFontSize(10);
    doc.setTextColor(10, 98, 47);
    doc.setFontStyle('bold');
    doc.text(dpto, doc.internal.pageSize.width / 2, 90, null, null, 'center');
    doc.setFontStyle('normal');
    doc.text(email, doc.internal.pageSize.width / 2, 100, null, null, 'center');
    doc.setDrawColor(10, 98, 47);
    doc.line(40, 105, 750, 105, 'S');
    doc.setFontSize(15);

    doc.setTextColor(0, 0, 0);
    doc.setFontType("bold");
    doc.text(title, 40, 120);
    doc.autoTable({
        head: [data.header],
        body: data.body,
        margin: { top: 125 },
        tableLineColor: [0, 0, 0],
        tableLineWidth: 0.5,
        styles: {
          lineColor: [0, 0, 0],
          lineWidth: 0.2,
        },
        headStyles: {
          fillColor: [255, 255, 255],
          textColor: [0, 0, 0],
          valign: 'middle',
          halign: 'center',
        },
        bodyStyles: {
            //halign: 'center',
            valign: 'middle',
            fontStyle: 'normal',
            textColor: [0, 0, 0],
        },
        // Default for all columns
        //  styles: { overflow: 'ellipsize', cellWidth: 'wrap' },
        // Override the default above for the text column
        //  columnStyles: { text: { cellWidth: 'auto' } },
        rowPageBreak: 'auto',
        bodyStyles: { valign: 'top' },

    });
    // footer de la pagina
    //var finalY = doc.previousAutoTable.finalY + 15;
    var pageSize = doc.internal.pageSize;
    var pageWidth = pageSize.width ? pageSize.width : pageSize.getWidth();

    // PAGE NUMBERING
    addFooters(doc);

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
