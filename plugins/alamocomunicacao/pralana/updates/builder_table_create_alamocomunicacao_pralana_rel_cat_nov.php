<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaRelCatNov extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_rel_cat_nov', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('cat_nov_id');
            $table->integer('novidades_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_rel_cat_nov');
    }
}
