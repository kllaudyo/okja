<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nm_usuario');
            $table->string("nm_email")->unique();
            $table->string("nm_senha");
            $table->integer("id_empresa")->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table("tb_usuarios", function(Blueprint $table){
            $table->foreign("id_empresa")->references("id_empresa")->on("tb_empresas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_usuarios');
    }
}
