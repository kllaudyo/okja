<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contas', function (Blueprint $table) {
            $table->increments('id_conta');
            $table->integer("id_empresa")->unsigned();
            $table->string("ds_conta", 100);
            $table->timestamps();
        });

        Schema::table("tb_contas", function(Blueprint $table){
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
        Schema::dropIfExists('tb_contas');
    }
}
