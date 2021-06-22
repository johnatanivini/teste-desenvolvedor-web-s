<?php
namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  Order::factory()
                ->count(5)
                ->create();

        echo "Usuário {$user->first()->name}, com email [ {$user->first()->email}], senha criada `password`";
    }
}
