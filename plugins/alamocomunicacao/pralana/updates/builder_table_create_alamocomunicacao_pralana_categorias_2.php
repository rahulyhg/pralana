<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaCategorias2 extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_categorias');
    }
}
