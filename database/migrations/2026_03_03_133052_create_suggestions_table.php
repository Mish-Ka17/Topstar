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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // кто предложен
            $table->string('field')->nullable(); // наука/спорт/искусство...
            $table->text('message')->nullable(); // комментарий-предложение персоны
            $table->string('user_email')->nullable(); // если гость. Email обязателен (для обратной связи)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
