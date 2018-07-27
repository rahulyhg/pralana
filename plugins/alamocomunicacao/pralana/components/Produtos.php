<?php namespace AlamoComunicacao\Pralana\Components;

use AlamoComunicacao\Pralana\Models\Produtos as ProdutosModel;
use AlamoComunicacao\Pralana\Models\Categorias as  CategoriasModel;
use AlamoComunicacao\Pralana\Models\FiltrosProdutos as  FiltrosProdutosModel;
use AlamoComunicacao\Pralana\Models\Filtros as  FiltrosModel;
use AlamoComunicacao\Pralana\Helper\Helper as Helper;
use Input;

class Produtos extends \Cms\Classes\ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Produtos',
            'description' => 'Displays Produtos.'
        ];
    }

    public function defineProperties(){
        return [
            'categoria' => [
                'title'   => 'Categoria Padrão',
                'type'    => 'string',
                'default' => 'All'
            ],
            'page' => [
                'title'   => 'Página Inicial',
                'type'    => 'string',
                'default' => '1'
            ],
            'perPage' => [
                'title'   => 'Produtos por Página',
                'type'    => 'string',
                'default' => '12'
            ]
        ];
    }

    public function onRun()
    {

        $this->produtos = $this->getProdutos();

    }

    public function onSearch(){
        $prd = '%'.$_POST['produto'].'%';
        $data = ProdutosModel::where('nome','LIKE',$prd)->orWhere('codigo','LIKE',$prd)->get();

        $dado = ['records'=>(count($data) > 0) ? $data : null,'titulo'=>['nome'=>'Resultados da Busca']];
        return [
            '#produtos' => $this->renderPartial('produtos',['records'=>$dado])
        ];        
    }

    public static function tags($cat){
        return ProdutosModel::select('alamocomunicacao_pralana_filtros.nome','alamocomunicacao_pralana_filtros.id')
                                ->join('alamocomunicacao_pralana_filtros_produtos', 'alamocomunicacao_pralana_filtros_produtos.produtos_id', '=', 'alamocomunicacao_pralana_produtos.id')
                                ->join('alamocomunicacao_pralana_filtros','alamocomunicacao_pralana_filtros.id','=','alamocomunicacao_pralana_filtros_produtos.filtros_id')
                                ->where('alamocomunicacao_pralana_produtos.categoria_id','=',$cat)
                                ->groupBy('alamocomunicacao_pralana_filtros_produtos.filtros_id')
                                ->get();
    }

    public function getProdutos()
    {
        if(!empty($this->property('categoria'))){
            $tit = CategoriasModel::where('slug','=',$this->property('categoria'))->first();
            $data = ProdutosModel::where('categoria_id','=',$tit['id'])->paginate($this->property('perPage'));

            $tags = $this->tags($tit['id']);

            $pages = count(ProdutosModel::where('categoria_id','=',$tit['id'])->get())/$this->property('perPage');
        }else{
            $tags = '';
            $data = ProdutosModel::paginate($this->property('perPage')); 
            $pages = count(ProdutosModel::all())/$this->property('perPage');
            $tit = ['nome'=>'Produtos'];
        }
        

        $dado = ['records'=>(count($data) > 0) ? $data : null,'titulo'=>$tit,'pages'=>ceil($pages),'action'=>'onGetProdutos','page'=>1,'tags'=>$tags,'fil'=>[]];

        return $dado;

    }


    public function onGetProdutos()
    {
        $cat = (isset ($_POST['cat'])) ? $_POST['cat'] : 'All';
        $page = (isset ($_POST['page'])) ? $_POST['page'] : 1;
        if($cat == 'All'){
            $data = ProdutosModel::paginate($this->property('perPage'),$page); 
            $pages = count(ProdutosModel::all())/$this->property('perPage');
            $tit = ['nome'=>'Produtos'];
        }else{
            $data = ProdutosModel::where('categoria_id','=',$cat)->paginate($this->property('perPage'),$page);
            $pages = count(ProdutosModel::where('categoria_id','=',$cat)->get())/$this->property('perPage');
            $tit = CategoriasModel::where('id','=',$cat)->first();
        }

        $dado = ['records'=>(count($data) > 0) ? $data : null,'titulo'=>$tit,'pages'=>ceil($pages),'action'=>'onGetProdutos','page'=>$page,'cat'=>$cat,'fil'=>[]];

        return [
            '#produtos' => $this->renderPartial('produtos',['records'=>$dado])
        ];

    }

    public function onFiltro(){
         if (isset($_POST['filtro']) && isset($_POST['cat'])){
            $data = ProdutosModel::leftJoin('alamocomunicacao_pralana_filtros_produtos', 'alamocomunicacao_pralana_filtros_produtos.produtos_id', '=', 'alamocomunicacao_pralana_produtos.id')
                                ->whereIn('alamocomunicacao_pralana_filtros_produtos.filtros_id', $_POST['filtro'])
                                ->where('alamocomunicacao_pralana_produtos.categoria_id','=',$_POST['cat'])
                                ->groupBy('alamocomunicacao_pralana_produtos.id')
                                ->get();
            $fil = FiltrosProdutosModel::whereIn('filtros_id', $_POST['filtro'])
                                ->leftJoin('alamocomunicacao_pralana_filtros', 'alamocomunicacao_pralana_filtros_produtos.filtros_id', '=', 'alamocomunicacao_pralana_filtros.id')
                                ->groupBy('alamocomunicacao_pralana_filtros.id')
                                ->get();
            $tags = $this->tags($_POST['cat']);
            $tit = ['nome'=>'Produtos por Filtro','id'=>$_POST['cat']];
            $ret = ['records'=>(count($data) > 0) ? $data : null,'titulo'=>$tit,'filtros'=>$fil,'tags'=>$tags,'fil'=>$_POST['filtro']];
        }else{
            $ret = $this->getProdutos();
        }

        return [
            '#produtos' => $this->renderPartial('produtos',['records'=>$ret])
        ];
    }


}
?>
