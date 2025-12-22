<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (! Schema::hasColumn('orders', 'user_id')) {
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
                }
                if (! Schema::hasColumn('orders', 'number')) {
                    $table->string('number')->unique()->nullable();
                }
                if (! Schema::hasColumn('orders', 'total')) {
                    $table->decimal('total', 12, 2)->default(0);
                }
                if (! Schema::hasColumn('orders', 'status')) {
                    $table->string('status')->default('pending');
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (Schema::hasColumn('orders', 'user_id')) {
                    $table->dropConstrainedForeignId('user_id');
                }
                if (Schema::hasColumn('orders', 'number')) {
                    $table->dropColumn('number');
                }
                if (Schema::hasColumn('orders', 'total')) {
                    $table->dropColumn('total');
                }
                if (Schema::hasColumn('orders', 'status')) {
                    $table->dropColumn('status');
                }
            });
        }
    }
};
