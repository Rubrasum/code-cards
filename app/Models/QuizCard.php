<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCard extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','is_archived','group','parent','type','data_string_1','data_string_2'];
}
