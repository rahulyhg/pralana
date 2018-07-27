<?php namespace AlamoComunicacao\Pralana\Models;

use Model;
use Carbon\Carbon as Carbon;
/**
 * Model
 */
class Novidades extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $attachMany = [
        'imagens' => 'System\Models\File'
    ];

    public $belongsTo = [
        'categorias' => ['\AlamoComunicacao\Pralana\Models\CategoriasNovidades']
    ];
        
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'alamocomunicacao_pralana_novidades';

    public function getCreatedAtAttribute($date){
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y - H:i');
    }
}
