<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'role_id','username', 'password', 'fullname', 'email',  
        'phone', 'status', 'time_expired'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'customers';
}
