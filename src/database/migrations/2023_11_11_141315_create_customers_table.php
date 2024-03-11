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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('family_name')->comment('姓');
            $table->string('first_name')->comment('名');
            $table->integer('postcode')->length(3)->comment('郵便番号(上3桁)');
            $table->integer('last_code')->length(4)->comment('郵便番号(下4桁)');
            $table->string('prefecture')->comment('都道府県');
            $table->string('city')->comment('市区町村');
            $table->string('address')->comment('番地・ビル名');
            $table->integer('phone_number')->length(11)->comment('電話番号');
            $table->date('birthday')->comment('誕生日');
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
        Schema::dropIfExists('customers');
    }
};
