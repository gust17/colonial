<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compra_colonials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Cesta::class);
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('asaas_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('data_pagamento')->nullable();
            $table->float('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_colonials');
    }
};
