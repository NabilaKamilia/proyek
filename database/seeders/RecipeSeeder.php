<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_recipes')->insert([
            'nama' => 'Spaghetti Aglio e Olio',
            'penulis' => 'Tantri SetyoRini',
            'tema' => 'Italian',
            'resep' => '100 gram spaghetti
            3 siung bawang putih
            3 buah cabe merah kecil
            2 sdt garam
            1/2 sdt merica bubuk
            2 sdm margarin (sbg pengganti minyak zaitun)
            1/2 panci air
            1 slice daging ham (bisa diganti dengan sosis ya)'
        ]);
    }
}
