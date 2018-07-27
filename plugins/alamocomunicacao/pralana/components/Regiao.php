<?php namespace AlamoComunicacao\Pralana\Components;

use AlamoComunicacao\Pralana\Models\Representantes as RepresentantesModel;
use AlamoComunicacao\Pralana\Helper\Helper as Helper;
use Input;

class Regiao extends \Cms\Classes\ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Representantes',
            'description' => 'Displays Representantes.'
        ];
    }

    public function defineProperties(){
        return [
            'estado' => [
                'title'   => 'Estado',
                'type'    => 'string',
                'default' => 'SP'
            ]
        ];
    }

    public function onRun()
    {

        $this->representantes = $this->getRepresentantes();

    }

    public function getRepresentantes()
    {

        $uf = $this->property('estado');
        $data = RepresentantesModel::where('uf','=',$uf)->get();
        $est = Helper::estado($uf);

        $dado = ['records'=>(count($data) > 0) ? $data : null,'uf'=>$est];

        return $dado;

    }


    public function onGetRepresentantes()
    {

        $uf = isset($_POST['uf']) ? $_POST['uf'] : 'SP';
        $data = RepresentantesModel::where('uf','=',$uf)->get();
        $est = Helper::estado($uf);
        $dado = ['records'=>(count($data) > 0) ? $data : null,'uf'=>$est];

        return [
            '#represent' => $this->renderPartial('regiao',['records'=>$dado])
        ];

    }


}
?>
