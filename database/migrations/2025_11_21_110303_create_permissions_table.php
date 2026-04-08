<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'moderator', 'user']);
            $table->string('permission_key'); // e.g., 'users.view'
            $table->string('permission_name'); // e.g., 'İstifadəçiləri görmək'
            $table->string('category'); // e.g., 'user_management'
            $table->string('icon')->nullable(); // e.g., '👥'
            $table->boolean('is_granted')->default(false);
            $table->timestamps();

            // Ensure unique permission per role
            $table->unique(['role', 'permission_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};

