<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Knjiga;
use App\Models\User;
use App\Models\Zanr;
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
        User::factory(10)->create();

        Autor::factory(5)->create();

        $z1 = new Zanr();
        $z1->naziv="Drama"; 
        $z1->save();

        $z1 = new Zanr();
        $z1->naziv="komedija"; 
        $z1->save();

        $z1 = new Zanr();
        $z1->naziv="Horor"; 
        $z1->save();

        $z1 = new Zanr();
        $z1->naziv="Klasik"; 
        $z1->save();

        $z1 = new Zanr();
        $z1->naziv="Ostalo"; 
        $z1->save();

        Knjiga::factory(10)->create();



    }
}
