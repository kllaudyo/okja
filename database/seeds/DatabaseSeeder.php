<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MovimentoTableSeeder::class);
    }
}

class ContaTableSeeder extends Seeder
{
    public function run()
    {
        DB::insert(
            "insert into tb_contas(id_empresa,ds_conta) values (?,?)",
            array(7,"Caixa")
        );

        DB::insert(
            "insert into tb_contas(id_empresa,ds_conta) values (?,?)",
            array(7,"Poupança")
        );

        DB::insert(
            "insert into tb_contas(id_empresa,ds_conta) values (?,?)",
            array(7,"Santander")
        );
    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        DB::insert(
            'insert into tb_categorias(id_empresa, ds_categoria, tp_categoria) VALUES (?,?,?)',
            array(7, "Renda", "C")
        );

        DB::insert(
            'insert into tb_categorias(id_empresa, ds_categoria, tp_categoria) VALUES (?,?,?)',
            array(7, "Habitação", "D")
        );

        DB::insert(
            'insert into tb_categorias(id_empresa, ds_categoria, tp_categoria) VALUES (?,?,?)',
            array(7, "Transporte", "D")
        );

        DB::insert(
            'insert into tb_categorias(id_empresa, ds_categoria, tp_categoria) VALUES (?,?,?)',
            array(7, "Alimentação", "D")
        );

        DB::insert(
            'insert into tb_categorias(id_empresa, ds_categoria, tp_categoria) VALUES (?,?,?)',
            array(7, "Compras", "D")
        );
    }
}

class MovimentoTableSeeder extends Seeder
{
    public function run()
    {
        $data = new DateTime();
        DB::insert(
            'insert into tb_movimentos(id_conta, id_categoria, ds_movimento, dt_previsao, vl_previsto) values (?,?,?,?,?)',
            array(1,4,"Salário", $data, 12000)
        );
    }
}
