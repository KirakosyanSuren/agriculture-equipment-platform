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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->foreignId('brand_id');
            $table->foreignId('equipment_type_id');
            $table->decimal('price', 12, 2);
            $table->enum('condition', ['new', 'used']);
            $table->integer('year');
            $table->integer('hour');
            $table->string('engine');
            $table->string('transmission');
            $table->string('fuel_type');
            $table->integer('horsepower');
            $table->string('location');
            $table->boolean('is_featured')->default(0);
            $table->string('model');
            $table->string('serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
