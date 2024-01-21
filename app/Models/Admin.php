<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'username', 'password', 'type', 'fullname', 'email',  
        'phone', 'status',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'admins';

     public function getAuthPassword()
     {
         return $this->password;
     }

     public function roles() {
        return $this->belongsToMany(Role::class, 'role_admins', 'admin_id', 'role_id');
    }

    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }
    // check nhiều roles thì whereIn
    public function hasRole($role) {
        return null !== $this->roles()->where('name',$role)->first();
    }
}
