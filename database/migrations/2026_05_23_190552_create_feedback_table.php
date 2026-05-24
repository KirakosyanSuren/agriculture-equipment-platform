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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_type_id')->nullable();
            $table->foreignId('career_id')->nullable();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->enum('contact_type', ['phone', 'email'])->nullable();
            $table->text('message');
            $table->boolean('status')->default(0);
            $table->string('page_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
