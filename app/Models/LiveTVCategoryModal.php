<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveTVCategoryModal extends Model
{
    use HasFactory;

     protected $table = 'channel_category';

    protected $fillable = ['*'];
}
