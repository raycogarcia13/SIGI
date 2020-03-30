<?php

use Illuminate\Database\Seeder;
use App\Models\Municipios;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Municipios::truncate();
       Municipios::create([
            'nombre'=> 'Sandino',
            'acronimo'=>'sand',
            'provincias'=>'1',
            'position'=>1
        ]);
       Municipios::create([
            'nombre'=> 'Mantua',
            'acronimo'=>'mant',
            'provincias'=>'1',
            'position'=>2
        ]);
       Municipios::create([
            'nombre'=> 'Minas de Matahambre',
            'acronimo'=>'minas de matahambre',
            'provincias'=>'1',
            'position'=>3
        ]);
       Municipios::create([
            'nombre'=> 'Viñales',
            'acronimo'=>'viña',
            'provincias'=>'1',
            'position'=>4
        ]);
       Municipios::create([
            'nombre'=> 'La Palma',
            'acronimo'=>'la pal',
            'provincias'=>'1',
            'position'=>5
        ]);
       Municipios::create([
            'nombre'=> 'Los Palacios',
            'acronimo'=>'los pal',
            'provincias'=>'1',
            'position'=>6
        ]);
       Municipios::create([
            'nombre'=> 'Consolación del Sur',
            'acronimo'=>'consolación',
            'provincias'=>'1',
            'position'=>7
        ]);
       Municipios::create([
            'nombre'=> 'Pinar del Río',
            'acronimo'=>'pinar',
            'provincias'=>'1',
            'position'=>8
        ]);
       Municipios::create([
            'nombre'=> 'San Luis',
            'acronimo'=>'Sanluis',
            'provincias'=>'1',
            'position'=>9
        ]);
       Municipios::create([
            'nombre'=> 'San Juan y Martínez',
            'acronimo'=>'san juan',
            'provincias'=>'1',
            'position'=>10
        ]);
       Municipios::create([
            'nombre'=> 'Guanes',
            'acronimo'=>'guanes',
            'provincias'=>'1',
            'position'=>11
        ]);  // ------- Artemisa
        Municipios::create([
            'nombre'=> 'Bahía Honda',
            'acronimo'=>'bahía',
            'provincias'=>'2',
            'position'=>12
        ]);
        Municipios::create([
            'nombre'=> 'Mariel',
            'acronimo'=>'mariel',
            'provincias'=>'2',
            'position'=>13
        ]);
        Municipios::create([
            'nombre'=> 'Guanajay',
            'acronimo'=>'guanajay',
            'provincias'=>'2',
            'position'=>14
        ]);
        Municipios::create([
            'nombre'=> 'Caimito',
            'acronimo'=>'caimito',
            'provincias'=>'2',
            'position'=>15
        ]);
        Municipios::create([
            'nombre'=> 'Bauta',
            'acronimo'=>'bauta',
            'provincias'=>'2',
            'position'=>16
        ]);
        Municipios::create([
            'nombre'=> 'San Antonio de los Baños',
            'acronimo'=>'san antonio',
            'provincias'=>'2',
            'position'=>17
        ]);
        Municipios::create([
            'nombre'=> 'Güira de Melena',
            'acronimo'=>'güira',
            'provincias'=>'2',
            'position'=>18
        ]);
        Municipios::create([
            'nombre'=> 'Alquízar',
            'acronimo'=>'alquízar',
            'provincias'=>'2',
            'position'=>19
        ]);
        Municipios::create([
            'nombre'=> 'Artemisa',
            'acronimo'=>'artemisa',
            'provincias'=>'2',
            'position'=>20
        ]);
        Municipios::create([
            'nombre'=> 'Candelaria',
            'acronimo'=>'cadelaria',
            'provincias'=>'2',
            'position'=>21
        ]);
        Municipios::create([
            'nombre'=> 'San Critobal',
            'acronimo'=>'san cristobal',
            'provincias'=>'2',
            'position'=>22
        ]);   // ------------- La Habana
        Municipios::create([
            'nombre'=> 'Playa',
            'acronimo'=>'playa',
            'provincias'=>'3',
            'position'=>23
        ]);
        Municipios::create([
            'nombre'=> 'Plaza de la Revolución',
            'acronimo'=>'plaza',
            'provincias'=>'3',
            'position'=>24
        ]);
        Municipios::create([
            'nombre'=> 'Centro Habana',
            'acronimo'=>'centro habana',
            'provincias'=>'3',
            'position'=>25
        ]);
        Municipios::create([
            'nombre'=> 'La Habana Vieja',
            'acronimo'=>'habana vieja',
            'provincias'=>'3',
            'position'=>26
        ]);
        Municipios::create([
            'nombre'=> 'Regla',
            'acronimo'=>'regla',
            'provincias'=>'3',
            'position'=>27
        ]);
        Municipios::create([
            'nombre'=> 'La Habana del Este',
            'acronimo'=>'habana del este',
            'provincias'=>'3',
            'position'=>28
        ]);
        Municipios::create([
            'nombre'=> 'Guanabacoa',
            'acronimo'=>'guanabacoa',
            'provincias'=>'3',
            'position'=>29
        ]);
        Municipios::create([
            'nombre'=> 'San Miguel del Padrón',
            'acronimo'=>'san miguel',
            'provincias'=>'3',
            'position'=>30
        ]);
        Municipios::create([
            'nombre'=> 'Diez de Octubre',
            'acronimo'=>'diez de octubre',
            'provincias'=>'3',
            'position'=>31
        ]);
        Municipios::create([
            'nombre'=> 'Cerro',
            'acronimo'=>'cerro',
            'provincias'=>'3',
            'position'=>32
        ]);
        Municipios::create([
            'nombre'=> 'Marianao',
            'acronimo'=>'marianao',
            'provincias'=>'3',
            'position'=>33
        ]);
        Municipios::create([
            'nombre'=> 'La Lisa',
            'acronimo'=>'la lisa',
            'provincias'=>'3',
            'position'=>34
        ]);
        Municipios::create([
            'nombre'=> 'Boyeros',
            'acronimo'=>'boyeros',
            'provincias'=>'3',
            'position'=>35
        ]);
        Municipios::create([
            'nombre'=> 'Arroyo Naranjo',
            'acronimo'=>'arroyo',
            'provincias'=>'3',
            'position'=>36
        ]);
        Municipios::create([
            'nombre'=> 'Cotorro',
            'acronimo'=>'cotorro',
            'provincias'=>'3',
            'position'=>37
        ]);  // ----- Mayabeque
        Municipios::create([
            'nombre'=> 'Bejucal',
            'acronimo'=>'bejucal',
            'provincias'=>'4',
            'position'=>38
        ]);
        Municipios::create([
            'nombre'=> 'San José de las Lajas',
            'acronimo'=>'san josé',
            'provincias'=>'4',
            'position'=>39
        ]);
        Municipios::create([
            'nombre'=> 'Jaruco',
            'acronimo'=>'jaruco',
            'provincias'=>'4',
            'position'=>40
        ]);
        Municipios::create([
            'nombre'=> 'Santa Cruz del Norte',
            'acronimo'=>'santa cruz',
            'provincias'=>'4',
            'position'=>41
        ]);
        Municipios::create([
            'nombre'=> 'Madruga',
            'acronimo'=>'madruga',
            'provincias'=>'4',
            'position'=>42
        ]);
        Municipios::create([
            'nombre'=> 'Nueva Paz',
            'acronimo'=>'nueva paz',
            'provincias'=>'4',
            'position'=>43
        ]);
        Municipios::create([
            'nombre'=> 'San Nicolás',
            'acronimo'=>'san nicolás',
            'provincias'=>'4',
            'position'=>44
        ]);
        Municipios::create([
            'nombre'=> 'Güines',
            'acronimo'=>'güines',
            'provincias'=>'4',
            'position'=>45
        ]);
        Municipios::create([
            'nombre'=> 'Melena del Sur',
            'acronimo'=>'melena',
            'provincias'=>'4',
            'position'=>46
        ]);
        Municipios::create([
            'nombre'=> 'Batabanó',
            'acronimo'=>'batabanó',
            'provincias'=>'4',
            'position'=>47
        ]);
        Municipios::create([
            'nombre'=> 'Quivián',
            'acronimo'=>'quivcán',
            'provincias'=>'4',
            'position'=>48
        ]);  //  ---------- Matanzas
        Municipios::create([
            'nombre'=> 'Matanzas',
            'acronimo'=>'matanzas',
            'provincias'=>'5',
            'position'=>49
        ]);
        Municipios::create([
            'nombre'=> 'Cárdenas',
            'acronimo'=>'cárdenas',
            'provincias'=>'5',
            'position'=>50
        ]);
        Municipios::create([
            'nombre'=> 'Martí',
            'acronimo'=>'martí',
            'provincias'=>'5',
            'position'=>51
        ]);
        Municipios::create([
            'nombre'=> 'Colón',
            'acronimo'=>'colón',
            'provincias'=>'5',
            'position'=>52
        ]);
        Municipios::create([
            'nombre'=> 'Perico',
            'acronimo'=>'perico',
            'provincias'=>'5',
            'position'=>53
        ]);
        Municipios::create([
            'nombre'=> 'Jovellanos',
            'acronimo'=>'jovellanos',
            'provincias'=>'5',
            'position'=>54
        ]);
        Municipios::create([
            'nombre'=> 'Pedro Vetancourt',
            'acronimo'=>'pedro ventacourt',
            'provincias'=>'5',
            'position'=>55
        ]);
        Municipios::create([
            'nombre'=> 'Limonar',
            'acronimo'=>'limonar',
            'provincias'=>'5',
            'position'=>56
        ]);
        Municipios::create([
            'nombre'=> 'Unión de Reyes',
            'acronimo'=>'unión de reyes',
            'provincias'=>'5',
            'position'=>57
        ]);
        Municipios::create([
            'nombre'=> 'Ciénaga de Zapata',
            'acronimo'=>'ciénaga',
            'provincias'=>'5',
            'position'=>58
        ]);
        Municipios::create([
            'nombre'=> 'Jagüey Grande',
            'acronimo'=>'jagüey',
            'provincias'=>'5',
            'position'=>59
        ]);
        Municipios::create([
            'nombre'=> 'Calimete',
            'acronimo'=>'calimete',
            'provincias'=>'5',
            'position'=>60
        ]);
        Municipios::create([
            'nombre'=> 'Los Arabos',
            'acronimo'=>'los arabos',
            'provincias'=>'5',
            'position'=>61
        ]);  //  -------------- Villa Clara
        Municipios::create([
            'nombre'=> 'Corralillo',
            'acronimo'=>'corralillo',
            'provincias'=>'6',
            'position'=>62
        ]);
        Municipios::create([
            'nombre'=> 'Quemados de Güines',
            'acronimo'=>'quemados',
            'provincias'=>'6',
            'position'=>63
        ]);
        Municipios::create([
            'nombre'=> 'Sagua la Grande',
            'acronimo'=>'sagua la grande',
            'provincias'=>'6',
            'position'=>64
        ]);
        Municipios::create([
            'nombre'=> 'Encrucijada',
            'acronimo'=>'encrucijada',
            'provincias'=>'6',
            'position'=>65
        ]);
        Municipios::create([
            'nombre'=> 'Camajuaní',
            'acronimo'=>'camajuaní',
            'provincias'=>'6',
            'position'=>66
        ]);
        Municipios::create([
            'nombre'=> 'Caibarién',
            'acronimo'=>'caibarién',
            'provincias'=>'6',
            'position'=>67
        ]);
        Municipios::create([
            'nombre'=> 'Remedios',
            'acronimo'=>'remedios',
            'provincias'=>'6',
            'position'=>68
        ]);
        Municipios::create([
            'nombre'=> 'Placetas',
            'acronimo'=>'placetas',
            'provincias'=>'6',
            'position'=>69
        ]);
        Municipios::create([
            'nombre'=> 'Santa Clara',
            'acronimo'=>'santa clara',
            'provincias'=>'6',
            'position'=>70
        ]);
        Municipios::create([
            'nombre'=> 'Cifuentes',
            'acronimo'=>'cifuentes',
            'provincias'=>'6',
            'position'=>71
        ]);
        Municipios::create([
            'nombre'=> 'Santo Domingo',
            'acronimo'=>'santo domingo',
            'provincias'=>'6',
            'position'=>72
        ]);
        Municipios::create([
            'nombre'=> 'Ranchuelo',
            'acronimo'=>'ranchelo',
            'provincias'=>'6',
            'position'=>73
        ]);
        Municipios::create([
            'nombre'=> 'Manicaragua',
            'acronimo'=>'manicaragua',
            'provincias'=>'6',
            'position'=>74
        ]);   // ------------ Cienfuegos
        Municipios::create([
            'nombre'=> 'Aguada de Pasajeros',
            'acronimo'=>'aguada',
            'provincias'=>'7',
            'position'=>75
        ]);
        Municipios::create([
            'nombre'=> 'Rodas',
            'acronimo'=>'rodas',
            'provincias'=>'7',
            'position'=>76
        ]);
        Municipios::create([
            'nombre'=> 'Palmira',
            'acronimo'=>'palmira',
            'provincias'=>'7',
            'position'=>77
        ]);
        Municipios::create([
            'nombre'=> 'Lajas',
            'acronimo'=>'lajas',
            'provincias'=>'7',
            'position'=>78
        ]);
        Municipios::create([
            'nombre'=> 'Cruces',
            'acronimo'=>'cruces',
            'provincias'=>'7',
            'position'=>79
        ]);
        Municipios::create([
            'nombre'=> 'Cumanayagua',
            'acronimo'=>'cumanayagua',
            'provincias'=>'7',
            'position'=>80
        ]);
        Municipios::create([
            'nombre'=> 'Cienfuegos',
            'acronimo'=>'cienfuegos',
            'provincias'=>'7',
            'position'=>81
        ]);
        Municipios::create([
            'nombre'=> 'Abreus',
            'acronimo'=>'abreus',
            'provincias'=>'7',
            'position'=>82
        ]);  // ------------ Sancti Spíritus
        Municipios::create([
            'nombre'=> 'Yaguajay',
            'acronimo'=>'yaguajay',
            'provincias'=>'8',
            'position'=>83
        ]);
        Municipios::create([
            'nombre'=> 'Jatibonico',
            'acronimo'=>'jatibonico',
            'provincias'=>'8',
            'position'=>84
        ]);
        Municipios::create([
            'nombre'=> 'Taguasco',
            'acronimo'=>'taguasco',
            'provincias'=>'8',
            'position'=>85
        ]);
        Municipios::create([
            'nombre'=> 'Cabaigúan',
            'acronimo'=>'cabaigúan',
            'provincias'=>'8',
            'position'=>86
        ]);
        Municipios::create([
            'nombre'=> 'Fomento',
            'acronimo'=>'fomento',
            'provincias'=>'8',
            'position'=>87
        ]);
        Municipios::create([
            'nombre'=> 'Trinidad',
            'acronimo'=>'trinidad',
            'provincias'=>'8',
            'position'=>88
        ]);
        Municipios::create([
            'nombre'=> 'Sancti Spíritus',
            'acronimo'=>'sancti spíritus',
            'provincias'=>'8',
            'position'=>89
        ]);
        Municipios::create([
            'nombre'=> 'La Sierpe',
            'acronimo'=>'la sierpe',
            'provincias'=>'8',
            'position'=>90
        ]);   // ----------- Ciego de Ávila
        Municipios::create([
            'nombre'=> 'Chambas',
            'acronimo'=>'chambas',
            'provincias'=>'9',
            'position'=>91
        ]);
        Municipios::create([
            'nombre'=> 'Morón',
            'acronimo'=>'morón',
            'provincias'=>'9',
            'position'=>92
        ]);
        Municipios::create([
            'nombre'=> 'Bolivia',
            'acronimo'=>'bolivia',
            'provincias'=>'9',
            'position'=>93
        ]);
        Municipios::create([
            'nombre'=> 'Primero de Enero',
            'acronimo'=>'primero de enero',
            'provincias'=>'9',
            'position'=>94
        ]);
        Municipios::create([
            'nombre'=> 'Ciro Redondo',
            'acronimo'=>'ciro',
            'provincias'=>'9',
            'position'=>95
        ]);
        Municipios::create([
            'nombre'=> 'Florencia',
            'acronimo'=>'florencia',
            'provincias'=>'9',
            'position'=>96
        ]);
        Municipios::create([
            'nombre'=> 'Majagua',
            'acronimo'=>'majagua',
            'provincias'=>'9',
            'position'=>97
        ]);
        Municipios::create([
            'nombre'=> 'Ciego de Ávila',
            'acronimo'=>'ciego',
            'provincias'=>'9',
            'position'=>98
        ]);
        Municipios::create([
            'nombre'=> 'Venezuela',
            'acronimo'=>'venezuela',
            'provincias'=>'9',
            'position'=>99
        ]);
        Municipios::create([
            'nombre'=> 'Baraguá',
            'acronimo'=>'baraguá',
            'provincias'=>'9',
            'position'=>100
        ]);   // --------------------- Camagüey
        Municipios::create([
            'nombre'=> 'Carlos Manuel de Céspedez',
            'acronimo'=>'carlos manuel de céspedez',
            'provincias'=>'10',
            'position'=>101
        ]);
        Municipios::create([
            'nombre'=> 'Esmeralda',
            'acronimo'=>'esmeralda',
            'provincias'=>'10',
            'position'=>102
        ]);
        Municipios::create([
            'nombre'=> 'Sierra de Cubitas',
            'acronimo'=>'sierra de cubitas',
            'provincias'=>'10',
            'position'=>103
        ]);
        Municipios::create([
            'nombre'=> 'Minas',
            'acronimo'=>'minas',
            'provincias'=>'10',
            'position'=>104
        ]);
        Municipios::create([
            'nombre'=> 'Nuevitas',
            'acronimo'=>'nuevitas',
            'provincias'=>'10',
            'position'=>105
        ]);
        Municipios::create([
            'nombre'=> 'Guáimaro',
            'acronimo'=>'guáimaro',
            'provincias'=>'10',
            'position'=>106
        ]);
        Municipios::create([
            'nombre'=> 'Sibanicú',
            'acronimo'=>'sibanicú',
            'provincias'=>'10',
            'position'=>107
        ]);
        Municipios::create([
            'nombre'=> 'Camagüey',
            'acronimo'=>'camagüey',
            'provincias'=>'10',
            'position'=>108
        ]);
        Municipios::create([
            'nombre'=> 'Florida',
            'acronimo'=>'florida',
            'provincias'=>'10',
            'position'=>109
        ]);
        Municipios::create([
            'nombre'=> 'Vertientes',
            'acronimo'=>'vertientes',
            'provincias'=>'10',
            'position'=>110
        ]);
        Municipios::create([
            'nombre'=> 'Jimaguayú',
            'acronimo'=>'jimaguayú',
            'provincias'=>'10',
            'position'=>111
        ]);
        Municipios::create([
            'nombre'=> 'Najasa',
            'acronimo'=>'Najasa',
            'provincias'=>'10',
            'position'=>112
        ]);
        Municipios::create([
            'nombre'=> 'Santa Cruz del Sur',
            'acronimo'=>'santa cruz del sur',
            'provincias'=>'10',
            'position'=>113
        ]);   //----------------- Las Tunas
        Municipios::create([
            'nombre'=> 'Manatí',
            'acronimo'=>'manatí',
            'provincias'=>'11',
            'position'=>114
        ]);
        Municipios::create([
            'nombre'=> 'Puerto Padre',
            'acronimo'=>'puerto padre',
            'provincias'=>'11',
            'position'=>115
        ]);
        Municipios::create([
            'nombre'=> 'Jesús Menéndez',
            'acronimo'=>'jesús menéndez',
            'provincias'=>'11',
            'position'=>116
        ]);
        Municipios::create([
            'nombre'=> 'Majibacoa',
            'acronimo'=>'majibacoa',
            'provincias'=>'11',
            'position'=>117
        ]);
        Municipios::create([
            'nombre'=> 'Las Tunas',
            'acronimo'=>'tunas',
            'provincias'=>'11',
            'position'=>118
        ]);
        Municipios::create([
            'nombre'=> 'Jobabo',
            'acronimo'=>'jobabo',
            'provincias'=>'11',
            'position'=>119
        ]);
        Municipios::create([
            'nombre'=> 'Colombia',
            'acronimo'=>'colombia',
            'provincias'=>'11',
            'position'=>120
        ]);
        Municipios::create([
            'nombre'=> 'Amancio Rodríguez',
            'acronimo'=>'amancio',
            'provincias'=>'11',
            'position'=>121
        ]);  //------------------------- Holguín
        Municipios::create([
            'nombre'=> 'Gibara',
            'acronimo'=>'gibara',
            'provincias'=>'12',
            'position'=>122
        ]);
        Municipios::create([
            'nombre'=> 'Rafael Freyre',
            'acronimo'=>'freyre',
            'provincias'=>'12',
            'position'=>123
        ]);
        Municipios::create([
            'nombre'=> 'Banes',
            'acronimo'=>'banes',
            'provincias'=>'12',
            'position'=>124
        ]);
        Municipios::create([
            'nombre'=> 'Antilla',
            'acronimo'=>'antilla',
            'provincias'=>'12',
            'position'=>125
        ]);
        Municipios::create([
            'nombre'=> 'Báguanos',
            'acronimo'=>'báguanos',
            'provincias'=>'12',
            'position'=>126
        ]);
        Municipios::create([
            'nombre'=> 'Holguín',
            'acronimo'=>'holguín',
            'provincias'=>'12',
            'position'=>127
        ]);
        Municipios::create([
            'nombre'=> 'Calixto García',
            'acronimo'=>'calixto',
            'provincias'=>'12',
            'position'=>128
        ]);
        Municipios::create([
            'nombre'=> 'Cacocum',
            'acronimo'=>'cacocum',
            'provincias'=>'12',
            'position'=>129
        ]);
        Municipios::create([
            'nombre'=> 'Urbano Noris',
            'acronimo'=>'urbano noris',
            'provincias'=>'12',
            'position'=>130
        ]);
        Municipios::create([
            'nombre'=> 'Cueto',
            'acronimo'=>'cueto',
            'provincias'=>'12',
            'position'=>131
        ]);
        Municipios::create([
            'nombre'=> 'Mayarí',
            'acronimo'=>'mayarí',
            'provincias'=>'12',
            'position'=>132
        ]);
        Municipios::create([
            'nombre'=> 'Frank País',
            'acronimo'=>'frank país',
            'provincias'=>'12',
            'position'=>133
        ]);
        Municipios::create([
            'nombre'=> 'Sagua de Tánamo',
            'acronimo'=>'sagua',
            'provincias'=>'12',
            'position'=>134
        ]);
        Municipios::create([
            'nombre'=> 'Moa',
            'acronimo'=>'moa',
            'provincias'=>'12',
            'position'=>135
        ]); // -------------------- Granma
        Municipios::create([
            'nombre'=> 'Río Cauto',
            'acronimo'=>'río cauto',
            'provincias'=>'13',
            'position'=>136
        ]);
        Municipios::create([
            'nombre'=> 'Cauto Cristo',
            'acronimo'=>'cauto cristo',
            'provincias'=>'13',
            'position'=>137
        ]);
        Municipios::create([
            'nombre'=> 'Jiguaní',
            'acronimo'=>'jiguaní',
            'provincias'=>'13',
            'position'=>138
        ]);
        Municipios::create([
            'nombre'=> 'Bayamo',
            'acronimo'=>'bayamo',
            'provincias'=>'13',
            'position'=>139
        ]);
        Municipios::create([
            'nombre'=> 'Yara',
            'acronimo'=>'yara',
            'provincias'=>'13',
            'position'=>140
        ]);
        Municipios::create([
            'nombre'=> 'Manzanillo',
            'acronimo'=>'manzanillo',
            'provincias'=>'13',
            'position'=>141
        ]);
        Municipios::create([
            'nombre'=> 'Campechuela',
            'acronimo'=>'campechuela',
            'provincias'=>'13',
            'position'=>142
        ]);
        Municipios::create([
            'nombre'=> 'Media Luna',
            'acronimo'=>'media luna',
            'provincias'=>'13',
            'position'=>143
        ]);
        Municipios::create([
            'nombre'=> 'Niquero',
            'acronimo'=>'niquero',
            'provincias'=>'13',
            'position'=>144
        ]);
        Municipios::create([
            'nombre'=> 'Pilón',
            'acronimo'=>'pilón',
            'provincias'=>'13',
            'position'=>145
        ]);
        Municipios::create([
            'nombre'=> 'Bartolomé Masó',
            'acronimo'=>'masó',
            'provincias'=>'13',
            'position'=>146
        ]);
        Municipios::create([
            'nombre'=> 'Buey Arriba',
            'acronimo'=>'buey arriba',
            'provincias'=>'13',
            'position'=>147
        ]);
        Municipios::create([
            'nombre'=> 'Guisa',
            'acronimo'=>'guisa',
            'provincias'=>'13',
            'position'=>148
        ]); //--------------- Santiago de Cuba
        Municipios::create([
            'nombre'=> 'Contramestre',
            'acronimo'=>'contramaestre',
            'provincias'=>'14',
            'position'=>149
        ]);
        Municipios::create([
            'nombre'=> 'Mella',
            'acronimo'=>'mella',
            'provincias'=>'14',
            'position'=>150
        ]);
        Municipios::create([
            'nombre'=> 'San Luis_',
            'acronimo'=>'san luis_',
            'provincias'=>'14',
            'position'=>151
        ]);
        Municipios::create([
            'nombre'=> 'Segundo Frente',
            'acronimo'=>'segundo frente',
            'provincias'=>'14',
            'position'=>152
        ]);
        Municipios::create([
            'nombre'=> 'Songo - la Maya',
            'acronimo'=>'songo',
            'provincias'=>'14',
            'position'=>153
        ]);
        Municipios::create([
            'nombre'=> 'Santiago de Cuba',
            'acronimo'=>'Santiago de Cuba',
            'provincias'=>'14',
            'position'=>154
        ]);
        Municipios::create([
            'nombre'=> 'Palma Soriano',
            'acronimo'=>'palma',
            'provincias'=>'14',
            'position'=>155
        ]);
        Municipios::create([
            'nombre'=> 'Tercer Frente',
            'acronimo'=>'tercer frente',
            'provincias'=>'14',
            'position'=>156
        ]);
        Municipios::create([
            'nombre'=> 'Guamá',
            'acronimo'=>'guamá',
            'provincias'=>'15',
            'position'=>157
        ]); // ----------- Guantánamo
        Municipios::create([
            'nombre'=> 'El Salvador',
            'acronimo'=>'salvador',
            'provincias'=>'15',
            'position'=>158
        ]);
        Municipios::create([
            'nombre'=> 'Manuel Támes',
            'acronimo'=>'manuel támes',
            'provincias'=>'15',
            'position'=>159
        ]);
        Municipios::create([
            'nombre'=> 'Yateras',
            'acronimo'=>'yateras',
            'provincias'=>'15',
            'position'=>160
        ]);
        Municipios::create([
            'nombre'=> 'Baracoa',
            'acronimo'=>'baracoa',
            'provincias'=>'15',
            'position'=>161
        ]);
        Municipios::create([
            'nombre'=> 'Maisí',
            'acronimo'=>'maisí',
            'provincias'=>'15',
            'position'=>162
        ]);
        Municipios::create([
            'nombre'=> 'Imías',
            'acronimo'=>'imías',
            'provincias'=>'15',
            'position'=>163
        ]);
        Municipios::create([
            'nombre'=> 'San Antonio del Sur',
            'acronimo'=>'san antonio del sur',
            'provincias'=>'15',
            'position'=>164
        ]);
        Municipios::create([
            'nombre'=> 'Caimanera',
            'acronimo'=>'caimanera',
            'provincias'=>'15',
            'position'=>165
        ]);
        Municipios::create([
            'nombre'=> 'Guantánamo',
            'acronimo'=>'guantánamo',
            'provincias'=>'15',
            'position'=>166
        ]);
        Municipios::create([
            'nombre'=> 'Niceto Pérez',
            'acronimo'=>'niceto pérez',
            'provincias'=>'15',
            'position'=>167
        ]);
        Municipios::create([
            'nombre'=> 'Isla de la Juventud',
            'acronimo'=>'isla',
            'provincias'=>'16',
            'position'=>168
        ]);
    }
}
