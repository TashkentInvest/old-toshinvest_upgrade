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
            // Add multi-language title columns
            if (!Schema::hasColumn('news', 'title_uz')) {
                $table->string('title_uz')->nullable()->after('title');
            }
            if (!Schema::hasColumn('news', 'title_ru')) {
                $table->string('title_ru')->nullable()->after('title_uz');
            }
            if (!Schema::hasColumn('news', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_ru');
            }

            // Add multi-language content columns
            if (!Schema::hasColumn('news', 'content_uz')) {
                $table->text('content_uz')->nullable()->after('content');
            }
            if (!Schema::hasColumn('news', 'content_ru')) {
                $table->text('content_ru')->nullable()->after('content_uz');
            }
            if (!Schema::hasColumn('news', 'content_en')) {
                $table->text('content_en')->nullable()->after('content_ru');
            }

            // Add excerpt columns
            if (!Schema::hasColumn('news', 'excerpt_uz')) {
                $table->text('excerpt_uz')->nullable()->after('content_en');
            }
            if (!Schema::hasColumn('news', 'excerpt_ru')) {
                $table->text('excerpt_ru')->nullable()->after('excerpt_uz');
            }
            if (!Schema::hasColumn('news', 'excerpt_en')) {
                $table->text('excerpt_en')->nullable()->after('excerpt_ru');
            }

            // Add SEO fields
            if (!Schema::hasColumn('news', 'meta_title_uz')) {
                $table->string('meta_title_uz')->nullable();
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

            // Add view counter
            if (!Schema::hasColumn('news', 'view_count')) {
                $table->unsignedBigInteger('view_count')->default(0)->after('published_at');
            }

            // Add publishing controls
            if (!Schema::hasColumn('news', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('published_at');
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

        // Add indexes for better performance (wrap in try-catch to avoid duplicates)
        try {
            Schema::table('news', function (Blueprint $table) {
                $table->index('is_featured');
            });
        } catch (\Exception $e) {
            // Index already exists
        }
        
        try {
            Schema::table('news', function (Blueprint $table) {
                $table->index(['is_published', 'published_at']);
            });
        } catch (\Exception $e) {
            // Index already exists
        }
        
        try {
            Schema::table('news', function (Blueprint $table) {
                $table->index('display_order');
            });
        } catch (\Exception $e) {
            // Index already exists
        }
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
                'title_uz', 'title_ru', 'title_en',
                'content_uz', 'content_ru', 'content_en',
                'excerpt_uz', 'excerpt_ru', 'excerpt_en',
                'meta_title_uz', 'meta_title_ru', 'meta_title_en',
                'meta_description_uz', 'meta_description_ru', 'meta_description_en',
                'meta_keywords_uz', 'meta_keywords_ru', 'meta_keywords_en',
                'view_count', 'is_published', 'is_featured', 'display_order'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('news', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
