<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    protected $table = 'radio';

    protected $fillable = ['title','description','image','time_slots','url'];


	//public $timestamps = false;
 
	public static function getRadioInfo($id,$field_name) 
    { 
		$rad_info = Radio::where('status','1')->where('id',$id)->first();
		
		if($rad_info)
		{
			return  $rad_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
