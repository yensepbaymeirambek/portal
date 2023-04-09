<?php

namespace Database\Seeders;

use Database\Factories\ClientFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClientSeeder::class
        ]);
    }
}
