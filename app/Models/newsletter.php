<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletter extends Model
{
    use HasFactory;
    
    public $fillable=['email','created_at','updated_at'];
}
