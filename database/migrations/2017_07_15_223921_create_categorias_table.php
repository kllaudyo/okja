<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_categorias', function (Blueprint $table) {
            $table->increments('id_categoria');
            $table->integer("id_empresa")->unsigned();
            $table->string("ds_categoria", 100);
            $table->string("tp_categoria", 1);
            $table->timestamps();
        });

        Schema::table("tb_categorias", function (Blueprint $table){
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
        Schema::dropIfExists('tb_categorias');
    }
}
