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
            $table->char('cnpj', 18)->unique();
            $table->text('description');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('websiteURL')->nullable();
            $table->string('road');
            $table->string('number');
            $table->char('cep', 9);
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->json('operatingSchedule');
            $table->string('locationPhoto');
            $table->string('ownerName');
            $table->string('ownerTelephone');
            $table->string('ownerEmail')->unique();
            $table->char('ownerCpf', 14)->unique();
            $table->string('status')->default('pendente');
            $table->text('ratingBusiness')->nullable();
            $table->timestamp('registrationDate')->useCurrent();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
