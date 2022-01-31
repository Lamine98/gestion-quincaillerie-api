<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModePaiement;
class ModePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type' => 'cash'],
            ['type' => 'virement bancaire']
        ];

        foreach($types as $type){
            ModePaiement::create($type);
        }
    }
}
