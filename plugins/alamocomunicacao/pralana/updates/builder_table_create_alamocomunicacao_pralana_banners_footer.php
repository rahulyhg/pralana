<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaBannersFooter extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_banners_footer', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descricao');
            $table->string('link');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_banners_footer');
    }
}
