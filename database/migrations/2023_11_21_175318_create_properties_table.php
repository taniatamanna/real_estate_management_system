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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('title')->nullable();
            $table->string('property_type')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('price')->nullable();
            $table->string('old_price')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('balconies')->nullable();
            $table->string('kitchens')->nullable();
            $table->string('size_sqft')->nullable();
            $table->string('location')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('status')->default('0')->comment('0=Pending,1=Approved,2=Rejected,3=Blocked');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('set null');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
