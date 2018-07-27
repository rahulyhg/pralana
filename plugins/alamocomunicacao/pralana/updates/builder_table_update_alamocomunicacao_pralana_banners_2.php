<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaBanners2 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->integer('area');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->dropColumn('area');
        });
    }
}
