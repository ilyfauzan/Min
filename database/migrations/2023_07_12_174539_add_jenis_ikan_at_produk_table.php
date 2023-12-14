<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('jenis')->after('description')->nullable();
        });
        Schema::table('produk_photos', function (Blueprint $table) {
            $table->boolean('is_thumbnail')->after('foto')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });
        Schema::table('produk_photos', function (Blueprint $table) {
            $table->dropColumn('is_thumbnail');
        });
    }
};
