<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaCores extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_cores', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_cores', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
