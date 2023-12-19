<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'category_id', 'name', 'desc', 'content', 'image',  
        'display_order', 'link', 'status','seo_name', 
    ];
    protected $primaryKey = 'id';
 	protected $table = 'banners';
}
