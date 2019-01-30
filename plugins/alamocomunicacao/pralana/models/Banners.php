<?php namespace AlamoComunicacao\Pralana\Models;

use Model;

/**
 * Model
 */
class Banners extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $attachOne = [
        'produto' => 'System\Models\File',
        'background' => 'System\Models\File'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'alamocomunicacao_pralana_banners';

    public function getBanners(){
        $banners = [];
        $data = $this->get();
        
        foreach($data as $prod){
            $prod['img'] = $this->getImageProduct($prod['id']);
            $prod['imgbg'] = $this->getImageBackground($prod['id']);
            $banners['banners'][] = $prod;
        }

        return json_encode($banners);
    }

    public function getImageProduct($id){
        $image = $this->find($id);
        if(!empty($image->produto)){
            return $image->produto->getThumb(200, 200);
        }else{
            return false;
        }
    }

    public function getImageBackground($id){
        $image = $this->find($id);
        if(!empty($image->background)){
            return $image->background->getThumb(600, 294);
        }else{
            return false;
        }
    }
}
