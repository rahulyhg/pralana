<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaCatNov extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_cat_nov', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_cat_nov');
    }
}
