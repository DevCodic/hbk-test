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
        Schema::create('business_forms', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_premium')->default(false);
            $table->string('business_name');
            $table->date('registration_date')->nullable();
            $table->date('renewal_date')->nullable();
            $table->date('expiry_date')->nullable();

            // Step 2: Key Contacts
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Step 3: Business Summary
            $table->text('business_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_forms');
    }
};
