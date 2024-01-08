<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    // $fillable là các biến có thể update 
    protected $fillable = [
    	'name', 'desc', 'content', 'root_id' ,'parent_id', 'level','display_order',
        'image', 'representative', 'status', 'seo_name',
        'meta_title', 'meta_desc', 'meta_keyword'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'news_categories';

    public static function buildListCategory (){
    
        $items = NewsCategory::orderBy('display_order', 'desc')->get();
        
        $data = [];

        foreach ($items as $keyParent => $item) {
            if( $item->parent_id == 0 ) {
                unset($items[$keyParent]);
                $data[] = $item;
                
                foreach($items as $keyChild => $item2){
                    if($item2->parent_id == $item->id){
                        unset($items[$keyChild]);
                        $data[] = $item2;

                        // foreach($items as $keyRelate => $item3){
                        //     if($item3->parent_id == $item2->id){
                        //         unset($items[$keyRelate]);
                        //         $data[] = $item3;
                        //     }   
                        // }
                    }
                }
            }
            
        }

        return $data;
    }

    public function news() {
        return $this->hasMany(News::class);
    }
}
