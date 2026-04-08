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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('E-Sürücü.az');
            $table->text('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('og_image')->nullable(); // Open Graph default image
            $table->string('twitter_handle')->nullable(); // @username
            $table->string('google_analytics_id')->nullable();
            $table->string('gtm_id')->nullable(); // Google Tag Manager
            $table->text('robots_txt')->nullable();
            $table->string('favicon')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('seo_settings')->insert([
            'site_title' => 'E-Sürücü.az - Sürücülük İmtahanına Hazırlıq',
            'site_description' => 'Azərbaycanda sürücülük vəsiqəsi almaq üçün ən yaxşı platforma. Testlər, xəbərlər və ssenari məşqləri.',
            'site_keywords' => 'sürücülük imtahanı, sürücülük testləri, azerbaijan driving license, e-surucu',
            'robots_txt' => "User-agent: *\nAllow: /\nDisallow: /admin/\nDisallow: /api/\n\nSitemap: " . config('app.url') . "/sitemap.xml",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};

