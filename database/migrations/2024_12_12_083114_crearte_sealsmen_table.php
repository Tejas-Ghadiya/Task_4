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
        Schema::create('sealsmen', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name');
            $table->integer('mobile_number');
            $table->string('shop_name');
            $table->string('ditels');
            $table->string('address');
            $table->string('email')->unique(); // Unique constraint for email
            $table->timestamp('email_verified_at')->nullable(); // Nullable for unverified users
            $table->string('password');
            $table->rememberToken(); // Used for "remember me" functionality
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sealsmen');
    }
};
