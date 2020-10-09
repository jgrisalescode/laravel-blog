<?php

namespace Database\Seeders;

use Faker\Factory;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Julian Grisales',
            'email' => 'j@admin.com',
            'password' => bcrypt('123456'),
        ]);

        // Creating post with factory
        \App\Models\Post::factory(24)->create();
    }
}
