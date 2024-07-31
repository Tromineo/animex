<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Anime;
use Database\Factories\AnimeFactory;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('anime')->insert([
        //     [
        //         'titulo' => 'Naruto',
        //         'resumo' => 'A story about a ninja.',
        //         'genero' => 'Action',
        //         'lancamento' => '2002-10-03',
        //         'episodios' => 1,
        //         'created_at' => date('Y-m-d'),
        //         'updated_at' => date('Y-m-d'),
        //     ],
        //     [
        //         'titulo' => 'One Piece',
        //         'resumo' => 'A story about pirates.',
        //         'genero' => 'Adventure',
        //         'lancamento' => '1999-10-20',
        //         'episodios' => 1,
        //         'created_at' => date('Y-m-d'),
        //         'updated_at' => date('Y-m-d'),
        //     ],
        //     // Add more anime records as needed
        // ]);

        factory(Anime::class, 10)->create();  // Adjust the number as needed

    }
}
