<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaNovidades2 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_novidades', function($table)
        {
            $table->renameColumn('cat_nov_id', 'categorias_id');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_novidades', function($table)
        {
            $table->renameColumn('categorias_id', 'cat_nov_id');
        });
    }
}
