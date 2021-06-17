<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version April 19, 2021, 3:09 am UTC
 *
 * @property string $telephone
 * @property string $address
 * @property integer $status_id
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'telephone',
        'address',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'telephone' => 'string',
        'address' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'telephone' => 'required',
        'address' => 'required',
        'status_id' => 'required'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopePaginatedesc($query)
    {
        return $query->where('deleted_at', NULL)->orderBy('id', 'desc');
    }


}
