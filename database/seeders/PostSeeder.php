<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => [
                'en' => 'Hello World',
                'hi' => 'नमस्ते दुनिया'
            ],
            'description' => [
                'en' => 'This is the first English description.',
                'hi' => 'यह पहला हिंदी विवरण है।'
            ],
        ]);

        Post::create([
            'title' => [
                'en' => 'Learning Laravel',
                'hi' => 'लारवेल सीखना'
            ],
            'description' => [
                'en' => 'Laravel is a PHP framework.',
                'hi' => 'लारवेल एक PHP फ्रेमवर्क है।'
            ],
        ]);
    }
}
