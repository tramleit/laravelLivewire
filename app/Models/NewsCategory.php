<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';

    protected $fillable = ['category_name','category_slug'];


	public $timestamps = false;
 
	 
	
	public static function getnewsCategoryInfo($id,$field_name) 
    { 
		$cat_info = NewsCategory::where('status','1')->where('id',$id)->first();
		
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
