<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('forms', 'can_apply_double_portion')) {
            return;
        }
        Schema::table('forms', function (Blueprint $table) {
            $table->boolean('can_apply_double_portion')->default(true)->after('coupon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('forms', 'can_apply_double_portion')) {
            return;
        }
        Schema::table('forms', function (Blueprint $table) {
            $table->drop('can_apply_double_portion');
        });
    }
}
