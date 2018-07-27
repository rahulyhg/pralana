<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaTamanhos extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_tamanhos', function($table)
        {
            $table->text('tamanho')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_tamanhos', function($table)
        {
            $table->decimal('tamanho', 10, 0)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
