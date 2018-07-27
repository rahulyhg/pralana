<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaArtistas extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_artistas', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_artistas', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
