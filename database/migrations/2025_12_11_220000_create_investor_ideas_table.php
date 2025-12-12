<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Investor Ideas Migration
 *
 * Creates table for storing investor project proposals/ideas
 * Supports multi-language content (ru, uz, en)
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
        Schema::create('investor_ideas', function (Blueprint $table) {
            $table->id();

            // Investor Information
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('position')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('website')->nullable();

            // Project Information (Multi-language)
            $table->string('project_title_uz');
            $table->string('project_title_ru');
            $table->string('project_title_en')->nullable();

            $table->text('project_description_uz');
            $table->text('project_description_ru');
            $table->text('project_description_en')->nullable();

            // Investment Details
            $table->decimal('estimated_investment', 15, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->integer('estimated_timeline_months')->nullable();
            $table->string('industry_sector')->nullable();

            // Location
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('preferred_location')->nullable();

            // Documents
            $table->string('business_plan_file')->nullable();
            $table->string('presentation_file')->nullable();
            $table->string('other_documents')->nullable();

            // Status & Tracking
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected', 'on_hold'])
                  ->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();

            // Metadata
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent', 500)->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('status');
            $table->index('district_id');
            $table->index('created_at');

            // Foreign Keys
            $table->foreign('district_id')
                  ->references('id')
                  ->on('districts')
                  ->onDelete('set null');

            $table->foreign('reviewed_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investor_ideas');
    }
};
