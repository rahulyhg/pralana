<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaTamanhos extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_tamanhos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('tamanho', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_tamanhos');
    }
}
