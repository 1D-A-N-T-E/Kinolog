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
        Schema::create('user_profiles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    
    // Profila dati
    $table->text('about')->nullable();
    $table->string('avatar')->nullable();
    
    // Adreses dati
    $table->string('street')->nullable();
    $table->string('house_number')->nullable();
    $table->string('city')->nullable();
    $table->string('district')->nullable();
    $table->string('postal_code')->nullable();
    $table->string('country')->default('Latvija');
    
    // Kontakti
    $table->string('phone')->nullable();
    $table->date('birthdate')->nullable();
    
    $table->timestamps();

    Schema::create('pets', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    
    $table->string('name');
    $table->integer('age');
    $table->string('species'); // suga (suns, kaķis, etc.)
    $table->boolean('is_trained')->default(false); // dresēts vai nē
    
    $table->timestamps();
});
Schema::create('user_comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->text('comment');
    $table->timestamps();
});
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('user_comments');
    }
};
