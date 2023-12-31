<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'category_id', 'name', 'org_name', 'desc', 'content', 'link_trailer',   
        'display_order', 'image', 'status', 'options', 'count_view', 'date_created',
        'date_updated', 'seo_name', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'movies';

    public function episode() {
        return $this->hasMany(Episode::class);
    }
    public function category() {
        return $this->belongsTo(MovieCategory::class);
    }
    // public function movie_genre() {
    //     return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    // }
}
