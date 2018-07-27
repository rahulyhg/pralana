<?php namespace AlamoComunicacao\Pralana\Models;

use Model;

/**
 * Model
 */
class CategoriasNovidades extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
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
    public $table = 'alamocomunicacao_pralana_cat_nov';
}
