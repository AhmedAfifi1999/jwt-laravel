<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table ="courses";
    protected $fillable=['title','user_id','description','total_videos']    ;
    public $timestamps =false;
}
