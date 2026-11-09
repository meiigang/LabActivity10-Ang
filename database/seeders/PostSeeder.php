<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();

        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        $kagawad = Author::where('email', 'kagawad.ang@bulletin.test')->firstOrFail();

        // Pinned post
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Ang Clean-up Drive',
            'category' => 'Event',
            'body' => 'Purok Ang Clean-up Drive is a community effort to keep our neighborhood clean and beautiful.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-08-08 08:00:00',
        ]);
    }
}
