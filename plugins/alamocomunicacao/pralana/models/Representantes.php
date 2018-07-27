<?php namespace AlamoComunicacao\Pralana\Models;

use Model;
use AlamoComunicacao\Pralana\Helper\Helper as Helper;

/**
 * Model
 */
class Representantes extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

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
    public $table = 'alamocomunicacao_pralana_representantes';

    public function getRepresentantes()
    {
        $dado = [];
        $data = $this->all();

        foreach($data as $rep){
            $rep['estado'] = Helper::estado($rep['uf']);
            $dado[] = $rep;
        }

        return json_encode($dado);
    }
}
