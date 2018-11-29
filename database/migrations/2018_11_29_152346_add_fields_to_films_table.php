<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->string('year')->nullable()->after('description');
            $table->string('quality_id')->nullable()->after('year');
            $table->string('world_art_id')->nullable()->after('quality_id');
            $table->string('kinogo_id')->nullable()->after('world_art_id');
            $table->string('type')->nullable()->after('kinogo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('quality_id');
            $table->dropColumn('world_art_id');
            $table->dropColumn('kinogo_id');
            $table->dropColumn('type');
        });
    }
}
