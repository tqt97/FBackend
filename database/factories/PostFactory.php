<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\PostStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(4),
            'slug' => Str::slug($title),
            'sub_title' => $this->faker->word(),
            'body' => $this->faker->text(),
            'status' => PostStatus::PENDING,
            'published_at' => $this->faker->dateTime(),
            'scheduled_for' => $this->faker->dateTime(),
            'cover_photo_path' => $this->faker->imageUrl(),
            'photo_alt_text' => $this->faker->word,
            'user_id' => User::factory(),
        ];
    }

    public function published(?Carbon $date = null): PostFactory
    {
        return $this->state(fn ($attribute) => [
            'status' => PostStatus::PUBLISHED,
            'published_at' => $date ?? Carbon::now(),
        ]);
    }

    public function pending(): PostFactory
    {
        return $this->state(fn ($attribute) => [
            'status' => PostStatus::PENDING,
        ]);
    }

    public function scheduled(?Carbon $date = null): PostFactory
    {
        return $this->state(fn ($attribute) => [
            'status' => PostStatus::SCHEDULED,
            'scheduled_for' => $date ?? Carbon::now(),
        ]);
    }
}
