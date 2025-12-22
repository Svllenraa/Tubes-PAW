<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('order_items')) {
            Schema::table('order_items', function (Blueprint $table) {
                if (! Schema::hasColumn('order_items', 'order_id')) {
                    $table->foreignId('order_id')->constrained()->onDelete('cascade');
                }
                if (! Schema::hasColumn('order_items', 'product_id')) {
                    $table->foreignId('product_id')->constrained()->onDelete('cascade');
                }
                if (! Schema::hasColumn('order_items', 'quantity')) {
                    $table->integer('quantity')->default(1);
                }
                if (! Schema::hasColumn('order_items', 'price')) {
                    $table->decimal('price', 12, 2)->default(0);
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('order_items')) {
            Schema::table('order_items', function (Blueprint $table) {
                if (Schema::hasColumn('order_items', 'order_id')) {
                    $table->dropConstrainedForeignId('order_id');
                }
                if (Schema::hasColumn('order_items', 'product_id')) {
                    $table->dropConstrainedForeignId('product_id');
                }
                if (Schema::hasColumn('order_items', 'quantity')) {
                    $table->dropColumn('quantity');
                }
                if (Schema::hasColumn('order_items', 'price')) {
                    $table->dropColumn('price');
                }
            });
        }
    }
};
