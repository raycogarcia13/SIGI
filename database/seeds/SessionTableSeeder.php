<?php

use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::truncate();
        Session::create([
            'simultaneo'=> false,
            'inactividad'=>20
        ]);
    }
}
