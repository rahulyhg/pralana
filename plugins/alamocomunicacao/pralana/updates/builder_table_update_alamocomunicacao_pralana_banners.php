<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaBanners extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->string('orientacao');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_banners', function($table)
        {
            $table->dropColumn('orientacao');
        });
    }
}
