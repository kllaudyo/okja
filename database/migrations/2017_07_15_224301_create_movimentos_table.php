<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_movimentos', function (Blueprint $table) {
            $table->increments('id_movimento');
            $table->integer("id_conta")->unsigned();
            $table->integer("id_categoria")->unsigned();
            $table->string("ds_movimento",255);
            $table->date("dt_previsao");
            $table->date("dt_confirmacao");
            $table->decimal("vl_previsto",10,2);
            $table->decimal("vl_confirmado",10,2);
            $table->timestamps();
        });

        Schema::table("tb_movimentos", function (Blueprint $table){
            $table->foreign("id_conta")->references("id_conta")->on("tb_contas");
            $table->foreign("id_categoria")->references("id_categoria")->on("tb_categorias");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_movimentos');
    }
}
