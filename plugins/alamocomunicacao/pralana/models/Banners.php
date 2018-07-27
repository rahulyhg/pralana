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
        $banners = $this->with('produto','background')->get();
        return json_encode($banners);
    }
}
