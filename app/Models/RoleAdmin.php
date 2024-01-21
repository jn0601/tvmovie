<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'role_id', 'admin_id',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'role_admins';
}
