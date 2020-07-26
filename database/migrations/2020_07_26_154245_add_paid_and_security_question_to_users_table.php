<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidAndSecurityQuestionToUsersTable extends Migration
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
            $table->string('security_question')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_name')->nullable();
            $table->bigInteger('card_number')->nullable();
            $table->string('card_cv')->nullable();
            $table->date('card_date_expired')->nullable();

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
            $table->dropColumn('security_question');
            $table->dropColumn('card_type');
            $table->dropColumn('card_name');
            $table->dropColumn('card_number');
            $table->dropColumn('card_cv');
            $table->dropColumn('card_date_expired');

        });
    }
}
