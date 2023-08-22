<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class TvCategory extends Model
{

    use HasFactory;
    protected $table = 'channel_category';

    protected $fillable = ['category_name','category_slug'];


    public $timestamps = false; 
     
    
    public static function getTvCategoryInfo($id,$field_name) 
    { 
        $cat_info = TvCategory::where('status','1')->where('id',$id)->first();
        
        if($cat_info)
        {
            return  $cat_info->$field_name;
        }
        else
        {
            return  '';
        }
    }

    
}
