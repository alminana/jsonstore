<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Settings(){
        return $this->hasMany(Setting::class,'setting_id','id');
    }

    public function setting_details(){
        return $this->hasMany(Setting::class,'setting_id','id');
    }
}
