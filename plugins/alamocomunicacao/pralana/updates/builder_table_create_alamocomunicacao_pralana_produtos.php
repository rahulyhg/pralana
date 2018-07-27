<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaProdutos extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('codigo');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_produtos');
    }
}
