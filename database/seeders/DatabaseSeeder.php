<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Seeder call must be inside this method
        $this->call(PostSeeder::class);
    }
}
