<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaCoresProdutos extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_cores_produtos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('cores_id');
            $table->integer('produtos_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_cores_produtos');
    }
}
