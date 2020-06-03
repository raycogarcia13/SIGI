// Mostrar el combobox de los Tipos de Categorias si es coge Categoria: Cuadro
var padre = $('#tipo_categoria').parent().parent();
padre.hide();

$('select#categoria_oc').on('change', function() {
    var valor = $(this).val();

    if ( valor == 5 ) {
        padre.show();
    } else {
        padre.hide();
    }
});


// Agregar +1 a la cantidad de plazas si se escoge a un jefe
$('#jestablec').on("click", function () {
    alert('cambio el checkbox');
    if($('#jestablec').prop('checked') == true)
    {
       // alert('cambio el checkbox');
        valor = $('#plazas').val();
        valor = valor + 1;
        $('#plazas').value(valor);
    }
    else
    {
        //alert('NO cambio el checkbox');
        valor = $('#plazas').val();
        if(valor != 0)
        {
            valor = valor - 1;
            // document.getElementById("plazas").value = valor;
            $('#plazas').value(valor);
        }
    }

});

// $('#jestablec').click(function(){
//     if (document.querySelector('#jestablec').checked) {
//       // if checked
//       console.log('checked');
//       alert('cambio el checkbox');
//     } else {
//       // if unchecked
//       console.log('unchecked');
//       alert('NO cambio el checkbox');
//     }
// });

// function onToggle() {
//     // check if checkbox is checked
//     if (document.querySelector('#jestablec').checked) {
//       // if checked
//       console.log('checked');
//       alert('cambio el checkbox');
//     } else {
//       // if unchecked
//       console.log('unchecked');
//       alert('NO cambio el checkbox');
//     }
//   };


