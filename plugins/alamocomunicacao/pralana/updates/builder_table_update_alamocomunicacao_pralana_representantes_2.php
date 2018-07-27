<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAlamocomunicacaoPralanaRepresentantes2 extends Migration
{
    public function up()
    {
        Schema::table('alamocomunicacao_pralana_representantes', function($table)
        {
            $table->text('subregiao')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('alamocomunicacao_pralana_representantes', function($table)
        {
            $table->string('subregiao', 191)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
