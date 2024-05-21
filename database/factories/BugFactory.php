<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bug>
 */
class BugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'priority_id' => Priority::all()->random(),
            'status_id' => Status::all()->random(),
            'description' => fake()->text(255),
            'assigned_staff_id' => User::factory(),
            'reporter_id' => User::factory(),
            'created_at' => now(),
        ];
    }

    public function high(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority_id' => 1,
        ]);
    }

    public function medium(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority_id' => 2,
        ]);
    }

    public function low(): static
    {
        return $this->state(fn (array $attributes) => [
            'priority_id' => 3,
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status_id' => 1,
        ]);
    }

    public function investigation(): static
    {
        return $this->state(fn (array $attributes) => [
            'status_id' => 2,
        ]);
    }

    public function fixed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status_id' => 3,
        ]);
    }
}
