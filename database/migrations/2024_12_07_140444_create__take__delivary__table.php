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
        Schema::create('take_delivary', function (Blueprint $table) {
            $table->id();
            $table->boolean('bill_condition')->default(1);
            $table->integer('Delivary_boy_id');
            $table->string('Delivary_boy_name');
            $table->string('Delivary_boy_number');
            $table->string('Delivary_boy_address');
            $table->string('bid');
            $table->integer('pid');
            $table->integer('uid');
            $table->string('user_name');
            $table->integer('mobile_number');
            $table->text('pimage');
            $table->text('pname');
            $table->integer('totel');
            $table->text('quantity');
            $table->text('ucity');
            $table->text('uaddress');
            $table->text('uzip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('take_delivary_table');
    }
};
