<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_notices', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('title_uz');
            $table->text('title_ru');
            $table->text('title_en')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();

            // Dates
            $table->string('announcement_date_uz')->nullable();
            $table->string('announcement_date_ru')->nullable();
            $table->string('announcement_date_en')->nullable();
            $table->string('deadline_uz');
            $table->string('deadline_ru');
            $table->string('deadline_en')->nullable();

            // Status
            $table->enum('status', ['active', 'completed', 'cancelled', 'draft'])->default('active');

            // Documents folder and announcement PDF
            $table->string('folder')->comment('Path to documents folder');
            $table->string('announcement_pdf')->nullable()->comment('Path to announcement PDF file');

            // Display order
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'order']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurement_notices');
    }
};
