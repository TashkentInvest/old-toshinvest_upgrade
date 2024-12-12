<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationColumnsToProjectsTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->decimal('latitude', 10, 6)->nullable()->after('hokim_resolution_no');
            $table->decimal('longitude', 10, 6)->nullable()->after('latitude');
            $table->text('geolocation')->nullable()->after('longitude');
            $table->string('geo_image')->nullable()->after('geolocation');
            $table->text('comment')->nullable()->after('geo_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('geolocation');
            $table->dropColumn('geo_image');
            $table->dropColumn('comment');
        });
    }
}
