<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaProdutos4 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->string('tamanhos');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->dropColumn('tamanhos');
        });
    }
}
