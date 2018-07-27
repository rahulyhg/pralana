<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaProdutos5 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->string('aba')->nullable();
            $table->string('carneira');
            $table->string('forro')->nullable();
            $table->renameColumn('tamanhos', 'material');
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_produtos', function($table)
        {
            $table->dropColumn('aba');
            $table->dropColumn('carneira');
            $table->dropColumn('forro');
            $table->renameColumn('material', 'tamanhos');
        });
    }
}
