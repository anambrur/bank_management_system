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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',100);
            $table->string('email',50);
            $table->bigInteger('mobile');
            $table->string('address',100);
            $table->string('photo',100);
            $table->bigInteger('nid_number');
            $table->date('date_of_birth');
            $table->string('nominee_name',100);
            $table->bigInteger('nominee_mobile');
            $table->bigInteger('nominee_nid_number');
            $table->string('document',100);
            $table->foreignId('account_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('password',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
