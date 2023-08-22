<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['*'];


	public $timestamps = false;
 
	 
	
	public static function getNewsInfo($id,$field_name) 
    { 
		$news_info = News::where('status','1')->where('id',$id)->first();
		
		if($news_info)
		{
			return  $news_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
