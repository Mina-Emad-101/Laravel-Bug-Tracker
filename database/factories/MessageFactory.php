<?php

namespace Database\Factories;

use App\Models\Bug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bug = Bug::all()->random();

        return [
            'sender_id' => $bug->assigned_staff,
            'receiver_id' => $bug->reporter,
            'bug_id' => $bug,
            'content' => fake()->text(50),
            'created_at' => now(),
        ];
    }
}
