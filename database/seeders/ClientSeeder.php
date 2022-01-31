<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['prenom' => 'Soce', 'nom' => 'ndiaye', 'email' => 'soce@soce.sn', 'role' => 'client', 'password' => bcrypt('passer123'), 'pays_residence'=>'sénégal', 'solde'=>10000],
            ['prenom' => 'Alla', 'nom' => 'niang', 'email' => 'alla@alla.sn', 'role' => 'client', 'password' => bcrypt('passer123'), 'pays_residence'=>'sénégal', 'solde'=>20000],

        ];

        foreach($users as $user){
            $data = new User();
            $data_client = new Client();

            $data->prenom = $user['prenom'];
            $data->nom = $user['nom'];
            $data->email = $user['email'];

            $data->role  = $user['role'];
            $data->password  = $user['password'];
            //$data->client()->pays_residence = $user['pays_residence'];
            $data_client->pays_residence = $user['pays_residence'];

            $data_client->solde = $user['solde'];
            //$data_client->user_id = $data->id;


            $data->save();
            $data->client()->save($data_client);
        }
    }
}
