<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['prenom' => 'Mamadou lamine', 'nom' => 'Bèye', 'email' => 'admin@admin.sn', 'role' => 'admin', 'password' => bcrypt('passer123')],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
