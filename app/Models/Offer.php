<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $table="offers";
    protected $fillable=['name_ar','photo','name_en','price','details_ar','details_en','photo'];
    protected $hidden=['updated_at','created_at'];
}
