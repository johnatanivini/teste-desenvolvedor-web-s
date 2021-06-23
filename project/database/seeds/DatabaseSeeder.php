<?php

namespace Database\Seeders;

use App\Models\Order;
use Database\Seeders\StatusSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersSeeder::class);
        $this->call(PeoplesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItensSeeder::class);
    }
}
