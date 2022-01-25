<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->string('subtotal');
            $table->string('cname');
            $table->string('phone');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->enum('provinsi', ['Jawa Timur', 'Jawa Tengah', 'Jawa Barat']);
            $table->string('note')->nullable();
            $table->enum('status', ['Pending', 'Diproses', 'Dipacking', 'Dikirim', 'Terkirim', 'Cancel', 'Selesai', 'Return'])->default('Pending');
            $table->string('resi')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
