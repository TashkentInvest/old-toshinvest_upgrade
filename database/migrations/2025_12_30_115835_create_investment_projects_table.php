<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code')->unique()->comment('e.g., TI-2025-001');

            // Location info (multi-language)
            $table->string('district_uz');
            $table->string('district_ru');
            $table->string('district_en')->nullable();

            $table->string('mahalla_uz')->nullable();
            $table->string('mahalla_ru')->nullable();
            $table->string('mahalla_en')->nullable();

            // Project details
            $table->decimal('land_area', 10, 4)->comment('in hectares');
            $table->date('announcement_date');
            $table->dateTime('submission_deadline');

            // Status
            $table->enum('status', ['active', 'archive', 'completed'])->default('active');

            // Documents
            $table->string('announcement_pdf')->nullable();
            $table->string('attachments_zip')->nullable();

            // Extension notice (optional)
            $table->boolean('has_extension')->default(false);
            $table->dateTime('extended_deadline')->nullable();
            $table->text('extension_note_uz')->nullable();
            $table->text('extension_note_ru')->nullable();
            $table->text('extension_note_en')->nullable();

            // Display order
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('status');
            $table->index('submission_deadline');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_projects');
    }
}
