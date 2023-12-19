<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'code', 'customer_id', 'service_id', 'status',
        'date_created', 'date_updated',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'orders';
}
