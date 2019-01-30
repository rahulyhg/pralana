<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaMateriais extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_materiais', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_materiais');
    }
}
