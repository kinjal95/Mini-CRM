<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Companies;
class Employees extends Model
{
    protected $table = "employees";
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];
    protected $hidden = ['created_at','updated_at'];
    public function company(){
        return $this->hasOne(Companies::class,'id','company_id');
    }
}
