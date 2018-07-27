<?php namespace AlamoComunicacao\Pralana;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            '\AlamoComunicacao\Pralana\Components\Regiao' => 'Regiao',
            '\AlamoComunicacao\Pralana\Components\Produtos' => 'Produtos',
            '\AlamoComunicacao\Pralana\Components\Novidades' => 'Novidades'
          ];
    }

    public function registerSettings()
    {
    }
}
