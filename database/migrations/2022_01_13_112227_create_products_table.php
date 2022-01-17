<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_level_one_id');
            $table->bigInteger('category_level_two_id');
            $table->bigInteger('category_level_three_id');
            $table->bigInteger('category_level_four_id');
            $table->bigInteger('category_level_five_id');
            $table->bigInteger('brand_id');
            $table->bigInteger('seller_id');
            $table->string('name');
            $table->text('description');
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
        Schema::dropIfExists('products');
    }
}
