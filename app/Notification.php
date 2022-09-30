<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Notification extends Model
{
   use Notifiable, HasApiTokens;

   protected $table = 'notification';
}	
