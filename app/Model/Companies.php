<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employees;
class Companies extends Model
{
    protected $table = 'companies';
    protected $fillable =[
        'id',
        'name',
        'email',
        'logo',
        'website'
    ];
    protected $hidden = ['created_at','updated_at'];
    
}
