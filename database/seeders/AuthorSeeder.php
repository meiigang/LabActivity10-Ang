<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Megan Ang',
            'position' => 'Kagawad',
            'email' => 'kagawad.ang@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}
