<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('last_name')->nullable();
            $table->bigInteger('phone_primary')->nullable();
            $table->bigInteger('phone_secondary')->nullable();
            $table->string('address_primary')->nullable();
            $table->string('address_secondary')->nullable();

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
            //
            $table->dropColumn('last_name');
            $table->dropColumn('phone_primary');
            $table->dropColumn('phone_secondary');
            $table->dropColumn('address_primary');
            $table->dropColumn('address_secondary');

        });
    }
}
