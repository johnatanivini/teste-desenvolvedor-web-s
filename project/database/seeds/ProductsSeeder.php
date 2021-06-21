<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  Product::factory()
                ->count(5)
                ->create();

        echo "Usuário {$user->first()->name}, com email [ {$user->first()->email}], senha criada `password`";
    }
}
