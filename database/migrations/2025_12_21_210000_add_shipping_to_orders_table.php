<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('orders') && ! Schema::hasColumn('orders', 'recipient_name')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->string('recipient_name')->nullable();
                $table->text('address')->nullable();
                $table->string('phone')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'recipient_name')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn(['recipient_name', 'address', 'phone']);
            });
        }
    }
};
