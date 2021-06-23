<?php

namespace Database\Seeders;

use App\Models\OrderItens;
use Database\Factories\OrderItensFactory;
use Illuminate\Database\Seeder;

class OrderItensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItens::factory()
            ->count(1)
            ->create();
    }
}
