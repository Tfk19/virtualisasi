<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUpdatedAtColumnInDimensiBukuTable extends Migration
{
    public function up()
    {
        Schema::table('dimensibuku', function (Blueprint $table) {
            // Menghapus kolom updated_at yang ada
            $table->dropColumn('updated_at');
        });

        Schema::table('dimensibuku', function (Blueprint $table) {
            // Menambahkan kembali kolom updated_at dengan tipe datetime dan nilai default saat ini
            $table->datetime('updated_at')->default(now())->nullable();
        });
    }

    public function down()
    {
        Schema::table('dimensibuku', function (Blueprint $table) {
            // Kembalikan kolom updated_at ke tipe timestamp jika Anda ingin melakukan rollback
            $table->timestamp('updated_at')->nullable()->default(now());
        });
    }
}
