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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('businessName');
            $table->string('category');
            $table->char('cnpj', 14)->unique();
            $table->text('description');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('websiteURL')->nullable();
            $table->json('socialMedia')->nullable();
            $table->string('road');
            $table->string('number');
            $table->char('cep', 9);
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->json('operatingDays');
            $table->json('operatingHours');
            $table->string('locationPhoto');
            $table->string('ownerName');
            $table->string('ownerTelephone');
            $table->string('ownerEmail')->unique();
            $table->char('ownerCpf', 11)->unique();
            $table->string('status')->default('pendente');
            $table->text('ratingBusiness')->nullable();;
            $table->timestamp('registrationDate')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
