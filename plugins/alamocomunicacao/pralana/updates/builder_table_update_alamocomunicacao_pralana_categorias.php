<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaCategorias extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->string('slug');
            $table->increments('id')->unsigned(false)->change();
            $table->string('nome')->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->dropColumn('slug');
            $table->increments('id')->unsigned()->change();
            $table->string('nome', 191)->change();
        });
    }
}
