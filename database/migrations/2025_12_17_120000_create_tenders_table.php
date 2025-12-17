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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('title');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->string('code')->nullable(); // e.g., 70.22.12.000-00001
            $table->string('lot_number')->nullable(); // e.g., 25120012464150
            $table->string('lot_url')->nullable(); // e.g., https://etender.uzex.uz/lot/464150

            // Purchase Subject
            $table->text('subject');
            $table->text('subject_uz')->nullable();
            $table->text('subject_en')->nullable();

            // Project Location
            $table->string('location');
            $table->string('location_uz')->nullable();
            $table->string('location_en')->nullable();
            $table->text('location_description')->nullable();
            $table->text('location_description_uz')->nullable();
            $table->text('location_description_en')->nullable();

            // Technical Requirements (JSON array)
            $table->json('technical_requirements')->nullable();

            // Qualification Requirements (JSON array)
            $table->json('qualification_requirements')->nullable();

            // Customer Information
            $table->string('customer_name')->default('АО «Tashkent Invest Company»');
            $table->string('customer_tin')->nullable(); // TIN/INN
            $table->string('customer_address')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();

            // Important Dates
            $table->date('announcement_date');
            $table->date('submission_deadline');

            // Documents (JSON array of file paths)
            $table->json('documents')->nullable();

            // Status
            $table->enum('status', ['draft', 'active', 'closed', 'cancelled'])->default('draft');
            $table->boolean('is_urgent')->default(false);

            // Metadata
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('status');
            $table->index('announcement_date');
            $table->index('submission_deadline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
