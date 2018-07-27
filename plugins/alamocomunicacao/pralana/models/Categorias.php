<?php namespace AlamoComunicacao\Pralana\Models;

use Model;
use AlamoComunicacao\Pralana\Components\Produtos as CompProd;

/**
 * Model
 */
class Categorias extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
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
    public $table = 'alamocomunicacao_pralana_categorias';

    function getCategories(){
        $categorias = [];
        $data = $this->all();

        foreach($data as $cat){
            $cat['filtros'] = CompProd::tags($cat['id']);
            $categorias[] = $cat;
        }

        return $categorias;
    }
}
