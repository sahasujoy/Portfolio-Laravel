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
        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null');

            $table->date('entry_date');
            $table->enum('type', ['deposit', 'expense']);
            $table->enum('category', ['bank', 'cash', 'general_expense']);

            $table->enum('currency', ['AED', 'INR', 'BDT']);
            $table->decimal('amount', 12, 2);
            $table->decimal('conversion_rate', 10, 4);

            // Not generated column due to Laravel limitations — calculate manually when inserting
            $table->decimal('bdt_amount', 14, 2);

            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledger_entries');
    }
};
