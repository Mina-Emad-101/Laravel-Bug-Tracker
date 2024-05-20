<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Bug
{
    private int $id;

    private string $priority;

    private string $status;

    private string $description;

    public function __construct(int $id, string $priority, string $status, string $description)
    {
        $this->id = $id;
        $this->priority = $priority;
        $this->status = $status;
        $this->description = $description;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array<Bug>
     */
    public static function getMockBugList(): array
    {
        $bugs = [
            new Bug(id: 1, priority: 'High', status: 'Pending', description: 'First Bug'),
            new Bug(id: 2, priority: 'Medium', status: 'Investigating', description: 'Second Bug'),
        ];

        return $bugs;
    }

    /**
     * @param  array<Bug>  $bugsArray
     */
    public static function findBug(array $bugsArray, int $id): Bug
    {
        $bug = Arr::first($bugsArray, function ($bug) use ($id) {
            return $bug->getID() == $id;
        });

        if (! $bug) {
            abort(code: 404, message: "No Bug Found with ID: $id");
        }

        return $bug;
    }
}
