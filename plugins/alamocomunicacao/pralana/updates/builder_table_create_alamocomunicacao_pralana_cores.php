<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaCores extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_cores', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('nome');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_cores');
    }
}
