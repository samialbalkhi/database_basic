<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable=['name','number_of_visits','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}
