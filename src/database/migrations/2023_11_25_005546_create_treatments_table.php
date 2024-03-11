<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->comment('顧客ID');
            $table->date('visit_date')->comment('来店日');
            $table->string('treatment_record')->comment('施術記録');
            $table->integer('total_amount')->comment('合計金額');
            $table->integer('coupon')->nullable()->comment('割引額');
            $table->integer('payment_amount')->comment('支払い金額');
            $table->text('notes')->nullable()->comment('備考');
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
        Schema::dropIfExists('treatments');
    }
};
