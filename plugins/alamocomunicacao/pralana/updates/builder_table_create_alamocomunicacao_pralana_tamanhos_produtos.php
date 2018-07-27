<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaTamanhosProdutos extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_tamanhos_produtos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('tamanhos_id');
            $table->integer('produtos_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_tamanhos_produtos');
    }
}
