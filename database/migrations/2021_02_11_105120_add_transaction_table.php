<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('user_id');
        $table->string('username');
        $table->integer('items');
        $table->integer('transaction_total');
        $table->string('transaction_status');//pending ,Success,failed
        $table->softDeletes();
        $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
