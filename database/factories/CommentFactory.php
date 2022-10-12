<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comment;
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'comment' => $this->faker->sentence,
            'date' => now(),
            'status' => 'test',
            'updated_at' => '',
            'created_at' => now(),
        ];
    }
}
