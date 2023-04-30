<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard', function (Blueprint $table) {
            $table->smallIncrements('id_dashboard');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('logo', 255)->nullable();
            $table->text('deskripsi');
            $table->string('whatsapp', 255);
            $table->string('instagram', 255);
            $table->string('twitter', 255);
            $table->string('facebook', 255);
            $table->string('youtube', 255);
            $table->string('gmail', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard');
    }
}
