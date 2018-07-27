<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaBanners extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_banners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('link')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_banners');
    }
}
