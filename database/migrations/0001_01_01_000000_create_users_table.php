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
        // Create the users table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->boolean('is_admin')->default(false); // Default is non-admin
            $table->string('name');
            $table->string('email')->unique(); // Unique constraint for email
            $table->timestamp('email_verified_at')->nullable(); // Nullable for unverified users
            $table->string('password');
            $table->rememberToken(); // Used for "remember me" functionality
            $table->timestamps(); // Created at and updated at timestamps
        });

        // Create the password reset tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Add an auto-incrementing ID for standardization
            $table->string('email')->index(); // Index instead of primary for better flexibility
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create the sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key for session ID
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Reference to users table
            $table->string('ip_address', 45)->nullable(); // Support IPv4 and IPv6
            $table->text('user_agent')->nullable(); // User agent details
            $table->longText('payload'); // Session data
            $table->integer('last_activity')->index(); // For session expiration checks
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order of creation
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
