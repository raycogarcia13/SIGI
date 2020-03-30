# Qué hacer para usar Infyom y mover Controller y Vistas a una carpeta, modificando rutas y caminos con los nuevos cambios

## Activar el datatables en Infyom:

- ir a config/infyom/laravel_generator.php
- en add_on ir a 'datatables' => false, y poner true

## Crear CRUD con Infyom desde una tabla en la BD:

```
php artisan infyom:scaffold NombreControlador --relations --fromTable --tableName=nombre_table_en_la_BD --datatables=true
```

## Modificar la ruta en routes/web.php:

Dice por ejemplo:

```
Route::resource('procesos', 'TecnicProcesoController');
```

Cabiarlo por:

```
Route::prefix('tecnica')->group(function() {
    Route::name('tecnica_')->group(function() {
        Route::resource('procesos', 'TecnicProcesoController');
    });
});
```

Esto genera:

- una url: ```tecnica/procesos```
- y el nombre a poner es: ```tecnica_procesos.[metodo]```

Con el cambio de ruta, hay que actualizar Controladores y Vistas lo que diga:

Donde decía:

```
{!! route('procesos.create') !!}
```

poner la nueva ruta:

```
{!! route('tecnica_procesos.index') !!}
```

__Ojo en el Controller también hay que hacer estos cambios.__

## Organizar todo en subdirectorio:

El Controller lo crea en ```app/Http/Controllers```  y queremos que lo ponga en ```app/Http/Controllers/Tenica/```

creamos el subdirectorio ```Tecnica``` y movemos el fichero Controllers en el subdirectorio creado.

Este cambio provoca una alteración del namespace en el Controller, por lo que hay que corregir el namespace en este fichero agragando el nombre del subdirectorio donde ahora está el Controllers

Estaba:

```
namespace App\Http\Controllers;
```

Corregido:

```
namespace App\Http\Controllers\Tecnica;
```

También hay que corregir le fichero ```router/web.php``` para que la ruta encuentre el Controlador:

Estaba:

```
  Route::prefix('tecnica')->group(function() {
    Route::name('tecnica_')->group(function() {
        Route::resource('procesos', 'TecnicProcesoController');
    });
  });
```

Corregido:
```
  Route::prefix('tecnica')->group(function() {
    Route::name('tecnica_')->group(function() {
        Route::resource('procesos', 'tecnica.TecnicProcesoController');
    });
  });
```

Solo falta mover las vistas a un subdirectorio

crear en ```resources\views\``` el subodirectorio ```tecnica``` y mover allí el directorio creado con el infyom.

Este cambio altera el camino de las vistas en el Controller por lo que se corrije:

Estaba:

```
  return view('tecnic_procesos.index')
```

Corregido:
```
  return view('tecnica.tecnic_procesos.index')
```

También en las vistas hay que corregir los ```@include()``` agregando ```tecnica.``` para que encuentre la plantilla a incluir.

El datatable también hay que corregirlo, en:
```
app/Datatables/TecnicProcesoDataTable.php
```

línea 21, corregir el camino a la vista de: ```datatables_actions.blade.php``` como estamos organizando todo en carpetas hay corregir el camino de esta vista, quedando esta línea de la siguiente forma:

```
return $dataTable->addColumn('action', 'tecnic.tecnic_procesos.datatables_actions');
```




