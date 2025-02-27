<?php

namespace Database\Seeders;

use App\Models\Owner;
use Database\Factories\OwnerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory()
            ->count(5)
            ->create();
    }
}
