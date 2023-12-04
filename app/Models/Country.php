<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'content', 'display_order', 'status',
        'seo_name', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'countries';
}
