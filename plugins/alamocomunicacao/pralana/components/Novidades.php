<?php namespace AlamoComunicacao\Pralana\Components;

use AlamoComunicacao\Pralana\Models\Novidades as NovidadesModel;
use Input;

class Novidades extends \Cms\Classes\ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Novidades',
            'description' => 'Displays Novidades.'
        ];
    }

    public function defineProperties(){
        return [
            'page' => [
                'title'   => 'Página Inicial',
                'type'    => 'string',
                'default' => '1'
            ],
            'perPage' => [
                'title'   => 'Notícias por Página',
                'type'    => 'string',
                'default' => '11'
            ]
        ];
    }

    public function onRun()
    {

        $this->novidades = $this->getNoticias();

    }

    public function onSearch(){
        $not = '%'.$_POST['termo'].'%';
        $data = NovidadesModel::where('titulo','LIKE',$not)->orWhere('texto','LIKE',$not)->get();
        $dado = ['records'=>(count($data) > 0) ? $data : null,'action'=>'onGetCategoria'];

        return [
            '#novidades' => $this->renderPartial('novidades_interna', ['records'=>$dado])
        ];        
    }

    public function onGetCategoria()
    {
        $page = (isset ($_POST['page'])) ? $_POST['page'] : 1;
        $cat = $_POST['cat'];
        $data = NovidadesModel::where('categorias_id','=',$cat)->paginate($this->property('perPage'),$page);
        $pages = count(NovidadesModel::where('categorias_id','=',$cat)->get())/$this->property('perPage');
        $dado = ['records'=>(count($data) > 0) ? $data : null,'pages'=>ceil($pages),'page'=>$page,'action'=>'onGetCategoria','cat'=>$cat];

        return [
            '#novidades' => $this->renderPartial('novidades_interna', ['records'=>$dado])
        ];   

    }

    public function getNoticias()
    {
        $data = NovidadesModel::paginate($this->property('perPage'));
        $pages = count(NovidadesModel::all())/$this->property('perPage');
        $dado = ['records'=>(count($data) > 0) ? $data : null,'pages'=>ceil($pages),'page'=>1,'action'=>'onGetNoticias','cat'=>0];

        return $dado;

    }

    public function onGetNoticias()
    {

        $data = NovidadesModel::paginate($this->property('perPage'),$_POST['page']);
        $pages = count(NovidadesModel::all())/$this->property('perPage');
        $dado = ['records'=>(count($data) > 0) ? $data : null,'pages'=>ceil($pages),'page'=>$_POST['page'],'action'=>'onGetNoticias','cat'=>0];

        return [
            '#novidades' => $this->renderPartial('novidades_interna', ['records'=>$dado])
        ];

    }


}
?>
