<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {

    use Notifiable;

    protected $table = "admin";
    protected $fillable = [
        'id',
        'name',
        'email',
    ];
    protected $hidden = ['password', 'created_at', 'remember_token','updated_at'];

}
