<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
    use HasFactory;

    protected $table= 'user_hobbies';

    protected $fillable = ['user_id','hobby_id'];
}
