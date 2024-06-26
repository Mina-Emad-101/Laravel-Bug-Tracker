<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        $status = Status::all()->random();

        return [
            'project_id' => Project::all()->random(),
            'priority_id' => $status->id == 1 ? null : Priority::all()->random(),
            'status_id' => $status,
            'description' => fake()->text(255),
            'assigned_staff_id' => $status->id == 1 ? null : User::where('role_id', 2)->get()->random(),
            'reporter_id' => User::where('role_id', 3)->get()->random(),
            'screenshot' => collect(Storage::disk('public')->files())
                ->filter(fn ($value, $key) => (
                    str_contains($value, '.png')
                    || str_contains($value, '.jpg')
                )
                    &&
                    $value != 'not_image.png'
                )->random(),
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
