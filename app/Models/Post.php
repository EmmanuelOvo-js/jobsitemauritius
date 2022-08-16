<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //for trash handler

class Post extends Model
{
    use SoftDeletes; //for trash

    protected $fillable = ['title','slug','content','status','image'];

}
