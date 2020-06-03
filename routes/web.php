<?php

use Illuminate\Support\Facades\Route;

Route::get('/',['as'=>'/', function () {
    return view('login');
}]);

// Autenticación
Route::post('/login', ['as'=>'authenticate','uses'=>'Auth\LoginController@authenticate']);
Route::post('/logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);

// Modulo Configuracion
Route::get('/get_modulos', ['as'=>'modulos','uses'=>'Config\ConfigController@getModulos']);
Route::get('/get_permisos', ['as'=>'permisos','uses'=>'Config\ConfigController@getPermisos']);
Route::get('/config', ['as'=>'config','uses'=>'Config\ConfigController@index']);
Route::put('/config/contrasena',['as'=>'password','uses'=>'Config\ConfigController@password']);
Route::post('/config/crypt',['as'=>'crypt','uses'=>'Config\ConfigController@crypt']);
Route::get('/config/empresa',['as'=>'empresa','uses'=>'Config\EmpresaController@index']);
Route::put('/config/empresa/edit',['as'=>'empresa.edit','uses'=>'Config\EmpresaController@edit']);
Route::get('/config/accesos', ['as'=>'accesos','uses'=>'Config\ConfigController@accesos']);
Route::get('/config/accesosData', ['as'=>'accesosData','uses'=>'Config\ConfigController@accesosData']);
Route::get('/config/politicas', ['as'=>'politicas','uses'=>'Config\ConfigController@politicas']);
Route::put('/config/politicas/edit', ['as'=>'politicas.edit','uses'=>'Config\ConfigController@politicasStore']);
// usuarios
Route::resource('/config/usuarios','Config\UsuariosController');
Route::put('/config/usuario/reactivar', ['as'=>'reactivarUsuario','uses'=>'Config\UsuariosController@reactivar']);
Route::get('/config/getUsuarios', ['as'=>'getUsuarios','uses'=>'Config\UsuariosController@getJson']);
Route::get('/config/getPersonas/{tipo?}', ['as'=>'getPersonas','uses'=>'Config\UsuariosController@personas']);
// permisos
Route::get('/config/permisos', ['as'=>'permisos.index','uses'=>'Config\PermisosController@index']);
Route::get('/config/getPermisos', ['as'=>'permisos.get','uses'=>'Config\PermisosController@getListasAcceso']);
Route::put('/config/permisos', ['as'=>'permisos.store','uses'=>'Config\PermisosController@update']);
Route::delete('/config/permisos', ['as'=>'permisos.store','uses'=>'Config\PermisosController@delete']);


Route::group(['prefix' => 'caphum'], function () {
    Route::get('/', ['as'=>'caphum','uses'=>'Caphum\CaphumController@index']);
    Route::resource('areas', 'Caphum\AreasController',["as" => 'caphum']);
    // Route::get('/getGraficos/', ['as' => 'plantillaGraficos', 'uses' => 'Caphum\CaphumController@getGraficos']);
    Route::get('/getGraficos/{datos?}', ['as' => 'plantillaGraficos', 'uses' => 'Caphum\CaphumController@getGraficos']);
    // Route::get('/getGraficos/{datos}'
    //     return
    // );

    //------------------- Plantilla ------------------------------
    Route::resource('plantillaCargos', 'Caphum\PlantillaCargosController',["as" => 'plantilla']);
    Route::resource('plantilla', 'Caphum\PlantillaCargosController',["as" => 'plantilla']);
    Route::get('getPlantilla', ['as'=>'caphum','uses'=>'Caphum\PlantillaCargosController@getJson']);
    Route::get('/getPlantillaPDF', ['as'=>'getPlantillaPDF','uses'=>'Caphum\PlantillaCargosController@getJsonPDF']);



    // CapHum Cargos
    Route::resource('cargos', 'Caphum\CargosController',["as" => 'caphum']);
    Route::get('/getCargos', ['as'=>'getCargos','uses'=>'Caphum\CargosController@getJson']);
    Route::put('/cargoss/reactivar', ['as'=>'reactivarcargos','uses'=>'Caphum\CargosController@reactivar']);
    Route::get('/getCargosPDF', ['as'=>'getCargosPDF','uses'=>'Caphum\CargosController@getJsonPDF']);


    //------------------------------ NOMENCLADORES ------------------------------------------------------------

    // Route::resource('gruposEscala', 'Caphum\GruposEscalaController', ["as" => 'caphum']);

    // CapHum Motivos de las Bajas
    Route::resource('motivosBajas', 'Caphum\MotivosBajasController',["as" => 'caphum']);
    Route::get('/getMotivosBajas', ['as'=>'getMotivosBajas','uses'=>'Caphum\MotivosBajasController@getJson']);
    Route::put('/motivos/reactivar', ['as'=>'reactivarMotivos','uses'=>'Caphum\MotivosBajasController@reactivar']);

    // CapHum Niveles de Preparacion
    Route::resource('nivelesPreparacion', 'Caphum\NivelesPreparacionController',["as" => 'caphum']);
    Route::get('/getNivelesPreparacion', ['as'=>'getNivelesPreparacion','uses'=>'Caphum\NivelesPreparacionController@getJson']);
    Route::put('/niveles/reactivar', ['as'=>'reactivarNivelesPreparacion','uses'=>'Caphum\NivelesPreparacionController@reactivar']);

    //CapHum Fuentes de Procedencia
    Route::resource('fuentesProcedencia', 'Caphum\FuentesProcedenciaController',["as" => 'caphum']);
    Route::get('/getFuentesProcedencia', ['as'=>'getFuentesProcedencia','uses'=>'Caphum\FuentesProcedenciaController@getJson']);
    Route::put('/fuentes/reactivar', ['as'=>'reactivarFuentesProcedencia','uses'=>'Caphum\FuentesProcedenciaController@reactivar']);

    //CapHum Tipos de Categorías Ocupacionales
    Route::resource('tiposCategoriasOcupacionales', 'Caphum\TiposCategoriasOcupacionalesController',["as" => 'caphum']);
    Route::get('/getTiposCategoriasOcupacionales', ['as'=>'getTiposCategoriasOcupacionales','uses'=>'Caphum\TiposCategoriasOcupacionalesController@getJson']);
    Route::put('/tiposocupacionales/reactivar', ['as'=>'reactivarTiposCategoriasOcupacionales','uses'=>'Caphum\TiposCategoriasOcupacionalesController@reactivar']);

    //CapHum Categorías Ocupacionales
    Route::resource('categoriasOcupacionales', 'Caphum\CategoriasOcupacionalesController',["as" => 'caphum']);
    Route::get('/getCategoriasOcupacionales', ['as'=>'getcategoriasOcupacionales','uses'=>'Caphum\CategoriasOcupacionalesController@getJson']);
    Route::put('/ocupacionales/reactivar', ['as'=>'reactivarCategoriasOcupacionales','uses'=>'Caphum\CategoriasOcupacionalesController@reactivar']);

    //CapHum Grupos Escala
    Route::resource('gruposEscala', 'Caphum\GruposEscalaController',["as" => 'caphum']);
    Route::get('/getGruposEscala', ['as'=>'getgruposEscala','uses'=>'Caphum\GruposEscalaController@getJson']);
    Route::put('/gruposescala/reactivar', ['as'=>'reactivarCategoriasOcupacionales','uses'=>'Caphum\GruposEscalaController@reactivar']);

    //CapHum Razas
    Route::resource('razas', 'Caphum\RazasController',["as" => 'caphum']);
    Route::get('/getRazas', ['as'=>'getrazas','uses'=>'Caphum\RazasController@getJson']);
    Route::put('/raza/reactivar', ['as'=>'reactivarRazas','uses'=>'Caphum\RazasController@reactivar']);

    //CapHum Sexo
    Route::resource('sexo', 'Caphum\SexoController',["as" => 'caphum']);
    Route::get('/getSexo', ['as'=>'getsexo','uses'=>'Caphum\SexoController@getJson']);
    Route::put('/sexos/reactivar', ['as'=>'reactivarSexo','uses'=>'Caphum\SexoController@reactivar']);

    //CapHum Estado Civil
    Route::resource('estadoCivil', 'Caphum\EstadoCivilController',["as" => 'caphum']);
    Route::get('/getEstadoCivil', ['as'=>'getestadoCivil','uses'=>'Caphum\EstadoCivilController@getJson']);
    Route::put('/estadocivil/reactivar', ['as'=>'reactivarEstadoCivil','uses'=>'Caphum\EstadoCivilController@reactivar']);

    //CapHum Grupo Sanguineo
    Route::resource('grupoSanguineo', 'Caphum\GrupoSanguineoController',["as" => 'caphum']);
    Route::get('/getGrupoSanguineo', ['as'=>'getgrupoSanguineo','uses'=>'Caphum\GrupoSanguineoController@getJson']);
    Route::put('/gruposanguineos/reactivar', ['as'=>'reactivarGrupoSanguineo','uses'=>'Caphum\GrupoSanguineoController@reactivar']);

    //CapHum Color de la Piel
    Route::resource('colorPiel', 'Caphum\ColorPielController',["as" => 'caphum']);
    Route::get('/getColorPiel', ['as'=>'getcolorPiel','uses'=>'Caphum\ColorPielController@getJson']);
    Route::put('/colorpiel/reactivar', ['as'=>'reactivarColorPiel','uses'=>'Caphum\ColorPielController@reactivar']);

    //CapHum Color de los Ojos
    Route::resource('colorOjos', 'Caphum\ColorOjosController',["as" => 'caphum']);
    Route::get('/getColorOjos', ['as'=>'getcolorOjos','uses'=>'Caphum\ColorOjosController@getJson']);
    Route::put('/colorojos/reactivar', ['as'=>'reactivarColorOjos','uses'=>'Caphum\ColorOjosController@reactivar']);

    //CapHum Talla Calzado
    Route::resource('tallaCalzado', 'Caphum\TallaCalzadoController',["as" => 'caphum']);
    Route::get('/getTallaCalzado', ['as'=>'getTallaCalzado','uses'=>'Caphum\TallaCalzadoController@getJson']);
    Route::put('/tallacalzados/reactivar', ['as'=>'reactivarTallaCalzado','uses'=>'Caphum\TallaCalzadoController@reactivar']);

    //CapHum Talla Pantalon
    Route::resource('tallaPantalon', 'Caphum\TallaPantalonController',["as" => 'caphum']);
    Route::get('/getTallaPantalon', ['as'=>'getTallaPantalon','uses'=>'Caphum\TallaPantalonController@getJson']);
    Route::put('/tallapantalons/reactivar', ['as'=>'reactivarTallaPantalon','uses'=>'Caphum\TallaPantalonController@reactivar']);

    //CapHum Talla Gorra
    Route::resource('tallaGorra', 'Caphum\TallaGorraController',["as" => 'caphum']);
    Route::get('/getTallaGorra', ['as'=>'getTallaGorra','uses'=>'Caphum\TallaGorraController@getJson']);
    Route::put('/tallagorras/reactivar', ['as'=>'reactivarTallaGorra','uses'=>'Caphum\TallaGorraController@reactivar']);

    //CapHum Organizaciones de Masas
    Route::resource('organizacionesMasas', 'Caphum\OrganizacionesMasasController',["as" => 'caphum']);
    Route::get('/getOrganizacionesMasas', ['as'=>'getOrganizacionesMasas','uses'=>'Caphum\OrganizacionesMasasController@getJson']);
    Route::put('/organizacionesmasass/reactivar', ['as'=>'reactivarOrganizacionesMasas','uses'=>'Caphum\OrganizacionesMasasController@reactivar']);

    //CapHum Especialidades de Estudio
    Route::resource('especialidadesEstudio', 'Caphum\EspecialidadesEstudioController',["as" => 'caphum']);
    Route::get('/getEspecialidadesEstudio', ['as'=>'getEspecialidadesEstudio','uses'=>'Caphum\EspecialidadesEstudioController@getJson']);
    Route::put('/especialidadesestudios/reactivar', ['as'=>'reactivarEspecialidadesEstudio','uses'=>'Caphum\EspecialidadesEstudioController@reactivar']);

    //CapHum Centros de Estudio
    Route::resource('centrosEstudio', 'Caphum\CentrosEstudioController',["as" => 'caphum']);
    Route::get('/getCentrosEstudio', ['as'=>'getCentrosEstudio','uses'=>'Caphum\CentrosEstudioController@getJson']);
    Route::put('/centrosestudios/reactivar', ['as'=>'reactivarCentrosEstudio','uses'=>'Caphum\CentrosEstudioController@reactivar']);

    //CapHum Categorias Cientificas
    Route::resource('categoriasCientificas', 'Caphum\CategoriasCientificasController',["as" => 'caphum']);
    Route::get('/getCategoriasCientificas', ['as'=>'getCategoriasCientificas','uses'=>'Caphum\CategoriasCientificasController@getJson']);
    Route::put('/categoriascientificas/reactivar', ['as'=>'reactivarCategoriasCientificas','uses'=>'Caphum\CategoriasCientificasController@reactivar']);

    //CapHum Categorias Docentes
    Route::resource('categoriasDocentes', 'Caphum\CategoriasDocentesController',["as" => 'caphum']);
    Route::get('/getCategoriasDocentes', ['as'=>'getCategoriasDocentes','uses'=>'Caphum\CategoriasDocentesController@getJson']);
    Route::put('/categoriasdocentes/reactivar', ['as'=>'reactivaDocentesCientificas','uses'=>'Caphum\CategoriasDocentesController@reactivar']);

    //CapHum Idiomas
    Route::resource('idiomas', 'Caphum\IdiomasController',["as" => 'caphum']);
    Route::get('/getIdiomas', ['as'=>'getIdiomas','uses'=>'Caphum\IdiomasController@getJson']);
    Route::put('/idiomass/reactivar', ['as'=>'reactivaIdiomas','uses'=>'Caphum\IdiomasController@reactivar']);

    //CapHum Ubicacion para la Defensa
    Route::resource('ubicacionDefensa', 'Caphum\UbicacionDefensaController',["as" => 'caphum']);
    Route::get('/getUbicacionDefensa', ['as'=>'getUbicacionDefensa','uses'=>'Caphum\UbicacionDefensaController@getJson']);
    Route::put('/ubicaciondefensa/reactivar', ['as'=>'reactivaUbicacionDefensa','uses'=>'Caphum\UbicacionDefensaController@reactivar']);

    //CapHum Tipo de Contrato
    Route::resource('tipoContrato', 'Caphum\TipoContratoController',["as" => 'caphum']);
    Route::get('/getTipoContrato', ['as'=>'getTipoContrato','uses'=>'Caphum\TipoContratoController@getJson']);
    Route::put('/tipocontrato/reactivar', ['as'=>'reactivaTipoContrato','uses'=>'Caphum\TipoContratoController@reactivar']);

    //CapHum Leyes Viales
    Route::resource('vialLeyes', 'Caphum\VialLeyesController',["as" => 'caphum']);
    Route::get('/getVialLeyes', ['as'=>'getVialLeyes','uses'=>'Caphum\VialLeyesController@getJson']);
    Route::put('/vialleyes/reactivar', ['as'=>'reactivaVialLeyes','uses'=>'Caphum\VialLeyesController@reactivar']);

    //CapHum Categorias Licencias Conduccion
    Route::resource('categoriasLicenciasConduccion', 'Caphum\CategoriasLicenciasConduccionController',["as" => 'caphum']);
    Route::get('/getCategoriasLicenciasConduccion', ['as'=>'getCategoriasLicenciasConduccion','uses'=>'Caphum\CategoriasLicenciasConduccionController@getJson']);
    Route::put('/categoriaslicenciasconduccion/reactivar', ['as'=>'reactivaCategoriasLicenciasConduccion','uses'=>'Caphum\CategoriasLicenciasConduccionController@reactivar']);

    //CapHum Contratos Laborales por Tipos
    Route::resource('contratosLaboralesTipos', 'Caphum\ContratosLaboralesTiposController',["as" => 'caphum']);
    Route::get('/getContratosLaboralesTipos', ['as'=>'getContratosLaboralesTipos','uses'=>'Caphum\ContratosLaboralesTiposController@getJson']);
    Route::put('/contratoslaboralestipos/reactivar', ['as'=>'reactivaContratosLaboralesTipos','uses'=>'Caphum\ContratosLaboralesTiposController@reactivar']);

    //CapHum Prendas
    Route::resource('prendas', 'Caphum\PrendasController',["as" => 'caphum']);
    Route::get('/getPrendas', ['as'=>'getPrendas','uses'=>'Caphum\PrendasController@getJson']);
    Route::put('/prendass/reactivar', ['as'=>'reactivaPrendas','uses'=>'Caphum\PrendasController@reactivar']);

    //CapHum Tallas
    Route::resource('tallas', 'Caphum\TallasController',["as" => 'caphum']);
    Route::get('/getTallas', ['as'=>'getTallas','uses'=>'Caphum\TallasController@getJson']);
    Route::put('/tallass/reactivar', ['as'=>'reactivaTallas','uses'=>'Caphum\TallasController@reactivar']);

    //CapHum Tallas Prendas Sexo
    Route::resource('tallasPrendasSexo', 'Caphum\Tallas_prenda_sexoController',["as" => 'caphum']);
    Route::get('/getTallasPrendasSexo', ['as'=>'getTallasPrendasSexo','uses'=>'Caphum\Tallas_prenda_sexoController@getJson']);
    Route::put('/tallasprendassexos/reactivar', ['as'=>'reactivaTallaPrendasSexo','uses'=>'Caphum\Tallas_prenda_sexoController@reactivar']);

    //CapHum Tallas Persona Verstuario Institucional
    Route::resource('tallaPerVestInst', 'Caphum\Talla_persona_vestuario_institucionalController',["as" => 'caphum']);
    Route::get('/getTallaPerVestInst', ['as'=>'getTallasPersonaVestuarioInstitucional','uses'=>'Caphum\Talla_persona_vestuario_institucionalController@getJson']);
    Route::put('/tallaPerVestInst/reactivar', ['as'=>'reactivaTallaPersonaVestuarioInstitucional','uses'=>'Caphum\Talla_persona_vestuario_institucionalController@reactivar']);

    //CapHum Tallas Persona Verstuario Presencia
    Route::resource('tallaPerVestPres', 'Caphum\Talla_persona_vestuario_presenciaController',["as" => 'caphum']);
    Route::get('/getTallaPerVestPres', ['as'=>'getTallasPersonaVestuarioPresencia','uses'=>'Caphum\Talla_persona_vestuario_presenciaController@getJson']);
    Route::put('/tallapervestpres/reactivar', ['as'=>'reactivaTallaPersonaVestuariopresencia','uses'=>'Caphum\Talla_persona_vestuario_presenciaController@reactivar']);

    //Provincias
    Route::resource('/provincias', 'ProvinciasController');
    Route::get('/getProvincias', ['as'=>'getProvincias','uses'=>'ProvinciasController@getJson']);
    Route::put('/provinciass/reactivar', ['as'=>'reactivaProvincias','uses'=>'ProvinciasController@reactivar']);

    //Municipos
    Route::resource('/municipios', 'MunicipiosController');
    Route::get('/getMunicipios', ['as'=>'getMunicipios','uses'=>'MunicipiosController@getJson']);
    Route::put('/municipioss/reactivar', ['as'=>'reactivaMunicipios','uses'=>'MunicipiosController@reactivar']);

    //Barrios
    Route::resource('/barrios', 'BarriosController');
    Route::get('/getBarrios', ['as'=>'getBarrios','uses'=>'BarriosController@getJson']);
    Route::put('/barrioss/reactivar', ['as'=>'reactivaBarrios','uses'=>'BarriosController@reactivar']);
    //------------------------------FIN NOMENCLADORES ------------------------------------------------------------

});

Route::post('/moveElements', ['as'=>'changePosition','uses'=>'Base\PositionController@move']);

// ------------ Enlaces a los graficos
Route::get('graficos/{nombre}',function($nombre){
    return view('graficos.ejemplo',compact('nombre'));
});
Route::get('graficos_plantilla/',function(){
    return view('graficos.plantilla');
});

