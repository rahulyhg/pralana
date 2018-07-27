<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaCategorias2 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->string('slug');
            $table->integer('order');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_categorias', function($table)
        {
            $table->dropColumn('slug');
            $table->dropColumn('order');
        });
    }
}
