<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    public $fillable=["name_ar","name_en","email","password","created_at","is_controller","updated_at"];
    public $hidden=["remember_token"];
}
