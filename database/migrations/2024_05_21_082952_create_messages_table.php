<?php

use App\Models\Bug;
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'sender_id')->nullable(true)->constrained('users')->nullOnDelete();
            $table->foreignIdFor(User::class, 'receiver_id')->nullable(true)->constrained('users')->nullOnDelete();
            $table->foreignIdFor(Bug::class, 'bug_id')->constrained()->cascadeOnDelete();
            $table->text('content');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
