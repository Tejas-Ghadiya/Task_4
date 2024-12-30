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
        Schema::create('dilivari_boy', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->boolean('is_dilivary_boy')->default(false); // Default is non-admin
            $table->boolean('terms_and_condition')->default(false);
            $table->string('name');
            $table->integer('mobile_number');
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
        Schema::dropIfExists('dilivari_boy');
    }
};
