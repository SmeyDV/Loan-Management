<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('loans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained('customers');
        $table->decimal('loan_amount', 10, 2);
        $table->boolean('has_ensurer')->default(false);
        $table->foreignId('ensurer_id')->nullable()->constrained('ensurers');
        $table->date('starting_date');
        $table->integer('payment_frequency');
        $table->decimal('interest_rate', 5, 2);
        $table->enum('currency', ['USD', 'KHR']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
