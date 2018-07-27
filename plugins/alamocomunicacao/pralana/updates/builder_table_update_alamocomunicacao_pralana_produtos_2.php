<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaProdutos2 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->text('tags')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->dropColumn('tags');
        });
    }
}
