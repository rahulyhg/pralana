<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteAlamocomunicacaoPralanaCategorias extends Migration
{
    public function up()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_categorias');
    }
    
    public function down()
    {
        Schema::create('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome', 191);
            $table->string('slug', 191);
        });
    }
}
