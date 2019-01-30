<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaBannersFooter extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_banners_footer', function($table)
        {
            $table->integer('sort_order');
            $table->increments('id')->unsigned(false)->change();
            $table->string('descricao')->change();
            $table->string('link')->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_banners_footer', function($table)
        {
            $table->dropColumn('sort_order');
            $table->increments('id')->unsigned()->change();
            $table->string('descricao', 191)->change();
            $table->string('link', 191)->change();
        });
    }
}
