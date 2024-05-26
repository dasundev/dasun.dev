<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid(Order::class)->constrained();
            $table->morphs('purchasable');
            $table->integer('unit_price')->unsigned();
            $table->smallInteger('unit_quantity')->unsigned()->default(1);
            $table->integer('total')->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_lines');
    }
};
