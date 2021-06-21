<?php
namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;

class PeoplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  People::factory()
                ->count(10)
                ->create();

        echo "Usuário {$user->first()->name}, com email [ {$user->first()->email}], senha criada `password`";
    }
}
