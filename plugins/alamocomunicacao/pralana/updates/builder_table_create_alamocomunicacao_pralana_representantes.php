<?php namespace AlamoComunicacao\Pralana\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAlamocomunicacaoPralanaRepresentantes extends Migration
{
    public function up()
    {
        Schema::create('alamocomunicacao_pralana_representantes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('subregiao');
            $table->string('representante');
            $table->string('email');
            $table->string('telefone');
            $table->string('uf');
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alamocomunicacao_pralana_representantes');
    }
}
