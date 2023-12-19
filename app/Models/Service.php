<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'seo_name', 'price', 'display_order', 'status',
        'date_created', 'date_updated',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'services';
}
