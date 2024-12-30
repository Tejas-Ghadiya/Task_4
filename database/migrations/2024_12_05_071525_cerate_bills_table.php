<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_condition');
            $table->boolean('dilivary_boy_comformation')->default(0);
            $table->integer('pid');
            $table->integer('uid');
            $table->integer('cdon');
            $table->text('pname');
            $table->text('pimage');
            $table->decimal('totel', 10, 2);
            $table->text('description');
            $table->integer('quantity');
            $table->integer('cardNumber');
            $table->text('expiryDate');
            $table->integer('cvv');
            $table->text('name');
            $table->text('email');
            $table->integer('mobile_number');
            $table->text('address');
            $table->text('city');
            $table->integer('zip');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
