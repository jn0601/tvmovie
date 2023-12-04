<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeServer extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'episode_id', 'server_id', 'link',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'episode_servers';
}
