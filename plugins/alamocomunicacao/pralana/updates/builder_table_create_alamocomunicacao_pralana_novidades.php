<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaNovidades extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_novidades', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->string('resumo');
            $table->text('texto');
            $table->string('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_novidades');
    }
}
