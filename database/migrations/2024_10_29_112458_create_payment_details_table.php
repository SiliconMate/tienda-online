<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('order_details')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('payment_method');
            $table->string('provider');
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded']);
            $table->timestamp('completed_at')->nullable();
            $table->decimal('total_paid', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
