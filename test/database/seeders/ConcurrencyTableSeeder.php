<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concurrency;

class ConcurrencyTableSeeder extends Seeder
{
    public function run()
    {
        Concurrency::create([
            'name' => 'Concurrency 1',
            'value' => 10,
        ]);

        Concurrency::create([
            'name' => 'Concurrency 2',
            'value' => 15,
        ]);
    }
}
