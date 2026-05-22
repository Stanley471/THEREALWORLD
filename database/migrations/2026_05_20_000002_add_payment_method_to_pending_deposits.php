<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pending_deposits', function (Blueprint $table) {
            $table->enum('payment_method', ['crypto', 'card'])->default('crypto')->after('wallet_id');
            $table->string('cardholder_name')->nullable()->after('currency');
            $table->string('card_last_four', 4)->nullable()->after('cardholder_name');
        });
    }

    public function down(): void
    {
        Schema::table('pending_deposits', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'cardholder_name', 'card_last_four']);
        });
    }
};
