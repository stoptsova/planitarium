<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models
 * @version April 8, 2021, 2:05 am UTC
 *
 * @property string $name
 * @property string $image
 * @property string $description
 * @property integer $prise
 */
class Menu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'menus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'image',
        'description',
        'prise'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'description' => 'string',
        'prise' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'image' => 'required',
        'description' => 'required',
        'prise' => 'required'
    ];

    
}
