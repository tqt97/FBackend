<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\NewLetter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Can;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::factory(10)->create();
        Tag::factory(10)->create();

        Post::factory(10)
        ->hasAttached(Category::factory()->count(2))
        ->hasAttached(Tag::factory()->count(2))
        ->create();
        NewLetter::factory(10)->create();
        Comment::factory(10)->create();
        User::factory()->create([
            'name' => 'TuanTQ',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234')
        ]);
    }
}
