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
            $table->string('business_name');
            $table->string('category');
            $table->char('cnpj', 14)->unique();
            $table->text('description')->nullable();
            $table->string('phone'); // Telefone
            $table->string('email')->unique(); // Email, deve ser único
            $table->string('website_url')->nullable(); // URL do site, pode ser nulo
            $table->json('social_media')->nullable(); // Redes sociais, armazenadas em formato JSON, podem ser nulas
            $table->string('street'); // Rua
            $table->string('number'); // Número
            $table->char('zipcode', 9); // CEP, 9 caracteres
            $table->string('neighborhood'); // Bairro
            $table->string('city'); // Cidade
            $table->string('state'); // Estado
            $table->json('working_days')->nullable(); // Dias de funcionamento, armazenados em formato JSON, podem ser nulos
            $table->json('working_hours')->nullable(); // Horário de funcionamento, armazenado em formato JSON, pode ser nulo
            $table->string('location_photo')->nullable(); // Foto do local, pode ser nulo
            $table->string('owner_name'); // Nome do proprietário
            $table->string('owner_phone'); // Telefone do proprietário
            $table->string('owner_email')->unique(); // Email do proprietário, deve ser único
            $table->char('owner_cpf', 11)->unique(); // CPF do proprietário, 11 caracteres, deve ser único
            $table->timestamps(); // Timestamps para created_at e updated_at
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
