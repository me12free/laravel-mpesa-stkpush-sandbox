<?php
// database/migrations/2025_06_21_000000_create_mpesa_transactions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->decimal('amount', 10, 2);
            $table->string('checkout_request_id')->nullable();
            $table->string('result_code')->nullable();
            $table->string('result_desc')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mpesa_transactions');
    }
};
