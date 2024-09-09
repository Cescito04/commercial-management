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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number_invoice')->unique();
            $table->date('date_creation');
            $table->decimal('price_invoice', 10, 2);
            $table->string('status');
            $table->enum('paiement_method', ['CHECK', 'SPECIES', 'BANK CARD']);
            $table->foreignId('order_id')->constrained('orders'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
