<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'seo_name', 'display_order'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'banner_categories';

    public function banner() {
        return $this->hasMany(Banner::class);
    }
}
