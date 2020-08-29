<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostMultiplierToFonts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fonts', function (Blueprint $table) {
            $table->float('cost_multiplier')->after('svg')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fonts', function (Blueprint $table) {
            $table->dropColumn('cost_multiplier');
        });
    }
}
