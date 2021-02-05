<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Participant extends Authenticatable implements MustVerifyEmail
{
    public $table = "participants";
    public $timestamps = true;
    protected $primaryKey = 'id_participant';
    protected $fillable = ['id_participant','name','email','phone','organization','confirmed','confirmation_code','IS_DELETE','IS_CERTIFICATE'];
}
