<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForms2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('forms', 'inviter_email')) {
            return;
        }
        Schema::table('forms', function (Blueprint $table) {
            $table->string('inviter_email')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('forms', 'inviter_email')) {
            return;
        }
        Schema::table('forms', function (Blueprint $table) {
            $table->drop('inviter_email');
        });
    }
}
