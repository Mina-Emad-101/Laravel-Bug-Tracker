<?php

use App\Models\Priority;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Priority::class)->nullable(true)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Status::class)->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->foreignIdFor(User::class, 'assigned_staff_id')->nullable(true)->constrained('users')->nullOnDelete();
            $table->foreignIdFor(User::class, 'reporter_id')->constrained('users')->nullOnDelete();
            $table->string('screenshot');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};
