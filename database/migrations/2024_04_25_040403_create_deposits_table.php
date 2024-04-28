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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('deposit_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('interest_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date');
            $table->bigInteger('deposit_scheme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
