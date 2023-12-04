<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerLink extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'display_order', 'status', 'date_created',
        'date_updated', 'seo_name'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'server_links';
}
