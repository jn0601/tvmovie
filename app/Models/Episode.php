<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'movie_id', 'admin_id', 'episode', 'name', 'desc', 'content',
        'display_order', 'status', 'options', 'count_view', 'date_created',
        'date_updated', 'seo_name', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'episodes';
}
