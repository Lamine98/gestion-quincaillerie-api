<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['intitule' => 'plomberie'],
            ['intitule' => 'construction'],
            ['intitule' => 'sanitaire']

        ];

        foreach($categories as $categorie){
            Categorie::create($categorie);
        }
    }
}
