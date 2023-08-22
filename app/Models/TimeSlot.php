<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table = 'timeslots';

    protected $fillable = ['time'];


	public $timestamps = false;
 
	 
	
	public static function getTimeSlotInfo($id,$field_name) 
    { 
		$time_info = TimeSlot::where('id',$id)->first();
		
		if($time_info)
		{
			return  $time_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
