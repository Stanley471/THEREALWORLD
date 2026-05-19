<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('daily_return_min', 5, 2)->nullable()->after('withdrawal_address');
            $table->decimal('daily_return_max', 5, 2)->nullable()->after('daily_return_min');
            $table->decimal('daily_return', 5, 2)->nullable()->after('daily_return_max');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['daily_return', 'daily_return_max', 'daily_return_min']);
        });
    }
};
