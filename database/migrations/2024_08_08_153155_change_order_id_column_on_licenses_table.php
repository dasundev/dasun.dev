<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->foreignUuid('order_id')->nullable()->after('user_id')->change()->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->foreignUuid('order_id')->after('user_id')->change()->constrained()->cascadeOnDelete();
        });
    }
};
