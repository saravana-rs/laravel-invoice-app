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
        Schema::create('invoice_items', function (Blueprint $table) {
         $table->id();
         $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
         $table->string('item_description');
         $table->integer('quantity');
         $table->decimal('price_per_item', 10, 2);
         $table->decimal('line_total', 10, 2); // quantity * price
         $table->timestamps();
       });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
