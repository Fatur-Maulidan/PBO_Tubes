<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class bukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 2000; $i++){
            // insert data ke table pegawai menggunakan Faker
    		DB::table('buku')->insert([
    			'namaBuku' => "Sang Pemimpi",
    			'author' => $faker->name,
    			'genreBuku' => 'Drama',
    			'jumlahBuku' => $faker->numberBetween(25,40)
    		]);
    	}
    }
}