<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaArtistas extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_artistas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('area');
            $table->string('frase');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_artistas');
    }
}
