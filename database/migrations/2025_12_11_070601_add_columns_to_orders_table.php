<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Tambah kolom baru jika belum ada
            if (!Schema::hasColumn('orders', 'order_id')) {
                $table->string('order_id')->unique()->after('id');
            }
            if (!Schema::hasColumn('orders', 'subtotal')) {
                $table->decimal('subtotal', 10, 2)->after('user_id');
            }
            if (!Schema::hasColumn('orders', 'ongkos_kirim')) {
                $table->decimal('ongkos_kirim', 10, 2)->default(5000)->after('subtotal');
            }
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('pending')->after('total');
            }
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->nullable()->after('status');
            }
            if (!Schema::hasColumn('orders', 'alamat')) {
                $table->text('alamat')->after('payment_method');
            }
            if (!Schema::hasColumn('orders', 'no_hp')) {
                $table->string('no_hp')->after('alamat');
            }
            if (!Schema::hasColumn('orders', 'nama_penerima')) {
                $table->string('nama_penerima')->after('no_hp');
            }
            if (!Schema::hasColumn('orders', 'catatan')) {
                $table->text('catatan')->nullable()->after('nama_penerima');
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'order_id', 'subtotal', 'ongkos_kirim', 'status',
                'payment_method', 'alamat', 'no_hp', 'nama_penerima', 'catatan'
            ]);
        });
    }
}