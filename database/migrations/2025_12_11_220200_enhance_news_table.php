<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Enhance News Table Migration
 *
 * Adds missing multi-language columns and improves existing news table
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
        Schema::table('news', function (Blueprint $table) {
            // Add English language support if not exists
            if (!Schema::hasColumn('news', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_ru');
            }

            if (!Schema::hasColumn('news', 'content_en')) {
                $table->text('content_en')->nullable()->after('content_ru');
            }

            if (!Schema::hasColumn('news', 'excerpt_en')) {
                $table->text('excerpt_en')->nullable()->after('excerpt_ru');
            }

            // Add SEO fields
            if (!Schema::hasColumn('news', 'meta_title_uz')) {
                $table->string('meta_title_uz')->nullable()->after('excerpt_en');
                $table->string('meta_title_ru')->nullable();
                $table->string('meta_title_en')->nullable();
            }

            if (!Schema::hasColumn('news', 'meta_description_uz')) {
                $table->text('meta_description_uz')->nullable();
                $table->text('meta_description_ru')->nullable();
                $table->text('meta_description_en')->nullable();
            }

            if (!Schema::hasColumn('news', 'meta_keywords_uz')) {
                $table->string('meta_keywords_uz')->nullable();
                $table->string('meta_keywords_ru')->nullable();
                $table->string('meta_keywords_en')->nullable();
            }

            // Add view counter if not exists
            if (!Schema::hasColumn('news', 'view_count')) {
                $table->unsignedBigInteger('view_count')->default(0)->after('published_at');
            }

            // Add featured flag
            if (!Schema::hasColumn('news', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('is_published');
            }

            // Add display order
            if (!Schema::hasColumn('news', 'display_order')) {
                $table->integer('display_order')->default(0)->after('is_featured');
            }
        });

        // Add indexes for better performance
        Schema::table('news', function (Blueprint $table) {
            $table->index('is_featured');
            $table->index(['is_published', 'published_at']);
            $table->index('display_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $columns = [
                'title_en', 'content_en', 'excerpt_en',
                'meta_title_uz', 'meta_title_ru', 'meta_title_en',
                'meta_description_uz', 'meta_description_ru', 'meta_description_en',
                'meta_keywords_uz', 'meta_keywords_ru', 'meta_keywords_en',
                'view_count', 'is_featured', 'display_order'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('news', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
