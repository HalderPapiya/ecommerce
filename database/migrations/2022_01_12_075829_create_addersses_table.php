<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdderssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addersses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('type');
            $table->string('street');
            $table->string('city');
            $table->string('pin_code');
            $table->string('state');
            $table->string('country');
            $table->tinyInteger('status')->default('1')->comment('1 = Active, 0 = Inactive');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addersses');
    }
}
