<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Banners Migration
 *
 * Creates table for homepage banner/slider management
 * Supports multi-language content and scheduling
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // Multi-language Titles
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en')->nullable();

            // Multi-language Subtitles/Descriptions
            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();

            // Media
            $table->string('image_path');
            $table->string('image_alt_text')->nullable();

            // Link/CTA
            $table->string('button_text_uz')->nullable();
            $table->string('button_text_ru')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('open_new_tab')->default(false);

            // Display Settings
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->enum('position', ['home_slider', 'side_banner', 'news_banner'])
                  ->default('home_slider');

            // Scheduling
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

            // Analytics
            $table->unsignedBigInteger('click_count')->default(0);
            $table->unsignedBigInteger('view_count')->default(0);

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['is_active', 'display_order']);
            $table->index('position');
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
