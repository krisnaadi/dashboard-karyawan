<?php

namespace Database\Seeders;

use App\Models\LogLogin;
use App\Models\Position;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(LogLogin::factory()->count(30), 'logLogins')
            ->has(Position::factory()->count(2), 'positions')
            ->create([
                'name' => 'Test User',
                'username' => 'test',
            ]);
        
        for ($i = 0; $i < 9; $i++) {
            User::factory()
                ->has(LogLogin::factory()->count(fake()->numberBetween(24, 30)), 'logLogins')
                ->has(Position::factory()->count(fake()->numberBetween(1, 3)), 'positions')
                ->create();
        }
    }
}
