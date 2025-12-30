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
        Schema::create('procurement_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procurement_notice_id')->constrained('procurement_notices')->onDelete('cascade');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en')->nullable();
            $table->string('file_path')->comment('Relative path to file from folder');
            $table->string('file_type')->default('pdf')->comment('File extension');
            $table->unsignedBigInteger('file_size')->nullable()->comment('File size in bytes');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index(['procurement_notice_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurement_documents');
    }
};
