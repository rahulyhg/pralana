<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaRepresentantes extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_representantes', function($table)
        {
            $table->text('email')->nullable(false)->unsigned(false)->default(null)->change();
            $table->text('telefone')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_representantes', function($table)
        {
            $table->string('email', 191)->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('telefone', 191)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
