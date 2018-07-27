<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaNovidades extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_novidades', function($table)
        {
            $table->integer('cat_nov_id');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_novidades', function($table)
        {
            $table->dropColumn('cat_nov_id');
        });
    }
}
