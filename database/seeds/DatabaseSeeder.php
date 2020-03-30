<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TrabajadorTableSeeder::class);
        $this->call(UsersTableConfigUser::class);
        $this->call(ModulosTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(PoliticasTableSeeder::class);
        $this->call(SessionTableSeeder::class);
        $this->call(TecnicProcesoTableSeeder::class);
        $this->call(CapHumAreas::class);
        $this->call(MotivosBajasSeeder::class);
        $this->call(FuentesProcedenciaSeeder::class);
        $this->call(NivelesPreparacionSeeder::class);
        $this->call(TiposCategoriasOcupacionalesSeeder::class);
        $this->call(CategoriasOcupacionalesSeeder::class);
        $this->call(GruposEscalasSeeder::class);
        $this->call(RazasSeeder::class);
        $this->call(SexoSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(GrupoSanguineoSeeder::class);
        $this->call(ColorPielSeeder::class);
        $this->call(ColorOjosSeeder::class);
        $this->call(TallaCalzadoSeeder::class);
        $this->call(TallaPantalonSeeder::class);
        $this->call(TallaGorraSeeder::class);
        $this->call(OrganizacionesMasasSeeder::class);
        $this->call(EspecialidadesEstudioSeeder::class);
        $this->call(CentrosEstudioSeeder::class);
        $this->call(CategoriasCientificasSeeder::class);
        $this->call(CategoriasDocentesSeeder::class);
        $this->call(IdiomasSeeder::class);
        $this->call(ProvinciasSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(UbicacionDefensaSeeder::class);
        $this->call(TipoContratoSeeder::class);
        $this->call(VialLeyesSeeder::class);
        $this->call(CategoriasLicenciasConduccionSeeder::class);
        $this->call(ContratosLaboralesTiposSeeder::class);
        $this->call(BarriosSeeder::class);
        $this->call(PrendasSeeder::class);
        $this->call(TallasSeeder::class);
        $this->call(TallasPrendaSexoSeeder::class);
        $this->call(TallaPersonaVestuarioInstitucionalSeeder::class);
        $this->call(TallaPersonaVestuarioPresenciaSeeder::class);
        // $this->call(::class);
    }
}
