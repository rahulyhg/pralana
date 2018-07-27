<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaProdutos extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->integer('categoria_id');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->dropColumn('categoria_id');
        });
    }
}
