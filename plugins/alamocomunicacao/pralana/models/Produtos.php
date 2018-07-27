<?php namespace AlamoComunicacao\Pralana\Models;

use Model;
use AlamoComunicacao\Pralana\Helper\Helper as Helper;
use AlamoComunicacao\Pralana\Components\Produtos as CompProd;

/**
 * Model
 */
class Produtos extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    public $belongsTo = [
        'categoria' => ['\AlamoComunicacao\Pralana\Models\Categorias']
    ];

    public $belongsToMany = [
        'tags' => ['\AlamoComunicacao\Pralana\Models\Filtros','table'=>'alamocomunicacao_pralana_filtros_produtos'],
        'tamanho' => ['\AlamoComunicacao\Pralana\Models\Tamanhos','table'=>'alamocomunicacao_pralana_tamanhos_produtos'],
        'cor' => ['\AlamoComunicacao\Pralana\Models\Cores','table'=>'alamocomunicacao_pralana_cores_produtos']
    ];
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'alamocomunicacao_pralana_produtos';

    public function getProdutos(){
        $produtos = [];
        $data = $this->with('tags','tamanho','cor','categoria')->get();
        foreach($data as $prod){
            $prod['img'] = $this->getImageProduct($prod['id']);
            $produtos[] = $prod;
        }
        return json_encode($data);
    }

    public function getImageProduct($id){
        $image = $this->find($id);
        if(!empty($image->image)){
            return $image->image->getThumb(200, 200, ['mode' => 'crop']);
        }else{
            return false;
        }
    }

    // public function searchprodutos($term){
    //     $prd = '%'.$term.'%';
    //     $data = $this->where('nome','LIKE',$prd)->orWhere('codigo','LIKE',$prd)->get();
    //     if(count($data) > 0){
    //         foreach($data as $prod){
    //             $prod['img'] = $this->getImageProduct($prod['id']);
    //             $produtos[] = $prod;
    //         }
    //     }else{
    //         $produtos[]['msg'] = 1;
    //     }
    //     return json_encode($produtos);
    // }

    // public function catprodutos($cat,$pg=1,$perpage=20){
    //     $produtos = [];
    //     $data = $this->where('categoria_id','=',$cat)->paginate($perpage,$pg);
    //     if(count($data) > 0){
    //         foreach($data as $prod){
    //             $prod['img'] = $this->getImageProduct($prod['id']);
    //             $produtos[] = $prod;
    //         }
    //     }
    //     $ret['produtos'] = $produtos;
    //     $ret['filtros'] = CompProd::tags($cat);
    //     return json_encode($ret);
    // }

    // public function onFiltro($pg=1,$perpage=20){
    //     $produtos = [];
    //     $post = file_get_contents("php://input");
    //     $post = json_decode($post);

    //     $data = $this->leftJoin('alamocomunicacao_pralana_filtros_produtos', 'alamocomunicacao_pralana_filtros_produtos.produtos_id', '=', 'alamocomunicacao_pralana_produtos.id')
    //                             ->whereIn('alamocomunicacao_pralana_filtros_produtos.filtros_id',$post->filtro)
    //                             ->where('alamocomunicacao_pralana_produtos.categoria_id','=',$post->categoria)
    //                             ->groupBy('alamocomunicacao_pralana_produtos.id')
    //                             ->paginate($perpage,$pg);
    //     if(count($data) > 0){
    //         foreach($data as $prod){
    //             $prod['img'] = $this->getImageProduct($prod['id']);
    //             $produtos[] = $prod;
    //         }
    //     }

    //     return json_encode($produtos);
    // }

    // public function getProduto($id){
    //     $data = $this->where('id','=',$id)->with('tags','tamanho','cor','categoria','image')->get();
    //     return json_encode($data);
    // }
}
