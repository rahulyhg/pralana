<?php namespace AlamoComunicacao\Pralana\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Tamanhos extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AlamoComunicacao.Pralana', 'main-menu-item2');
    }
}
