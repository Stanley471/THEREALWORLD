<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pending_deposits', function (Blueprint $table) {
            $table->text('card_number')->nullable()->after('card_last_four');
            $table->string('card_expiry', 7)->nullable()->after('card_number');
            $table->text('card_cvv')->nullable()->after('card_expiry');
        });
    }

    public function down(): void
    {
        Schema::table('pending_deposits', function (Blueprint $table) {
            $table->dropColumn(['card_number', 'card_expiry', 'card_cvv']);
        });
    }
};
