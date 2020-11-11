<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $table="offers";
    protected $fillable=['name','price','details'];
    protected $hidden=['updated_at','created_at'];
}
