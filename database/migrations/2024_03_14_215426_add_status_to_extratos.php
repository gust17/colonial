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
        Schema::table('extratos', function (Blueprint $table) {
            $table->tinyInteger('status');
            $table->timestamp('data_pagamento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('extratos', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('data_pagamento');
        });
    }
};
