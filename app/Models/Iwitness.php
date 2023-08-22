<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Iwitness extends Authenticatable
{
    
    protected $table = 'iwitness';
    protected $fillable = ['title','location','description','date','file'];

}

