<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->boolean('admin')->after('email_verified_at')->default(false);
            $table->boolean('enabled')->after('admin')->default(true);
            $table->timestamp('last_login_at')->after('updated_at')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admin');
            $table->dropColumn('enabled');
            $table->dropColumn('last_login_at');
        });
    }
}
