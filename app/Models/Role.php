<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'status',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'roles';

    public function admins() {
        return $this->belongsToMany(Admin::class, 'role_admins', 'role_id', 'admin_id');
    }
}
