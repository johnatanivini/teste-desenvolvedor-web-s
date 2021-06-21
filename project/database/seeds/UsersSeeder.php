<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::factory()
                ->count(1)
                ->create();

        echo "Usuário {$user->first()->name}, com email [ {$user->first()->email}], senha criada `password`";
    }
}
