<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->unsignedInteger('id_kategori')->change();
            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('kode_produk')->after('id_kategori')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign(['id_kategori']);
            $table->integer('id_kategori')->change();
            $table->dropColumn('kode_produk');
        });
    }
};
