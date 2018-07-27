<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaBanners3 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
