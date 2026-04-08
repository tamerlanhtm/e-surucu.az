<?php

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
        Schema::create('headline_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('scroll_speed')->default(30); // Animation duration in seconds (lower = faster)
            $table->integer('font_size')->default(14); // Font size in pixels
            $table->string('font_weight')->default('normal'); // normal, medium, semibold, bold
            $table->string('background_color')->default('#2563eb'); // Hex color
            $table->string('text_color')->default('#ffffff'); // Hex color
            $table->string('order_type')->default('ordered'); // ordered, random
            $table->boolean('is_enabled')->default(true);
            $table->boolean('pause_on_hover')->default(true);
            $table->timestamps();
        });

        // Insert default settings
        DB::table('headline_settings')->insert([
            'scroll_speed' => 30,
            'font_size' => 14,
            'font_weight' => 'normal',
            'background_color' => '#2563eb',
            'text_color' => '#ffffff',
            'order_type' => 'ordered',
            'is_enabled' => true,
            'pause_on_hover' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headline_settings');
    }
};
