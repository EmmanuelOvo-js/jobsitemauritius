<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Testimonial extends Model
{
    // protected $table = "testimonials";
    // protected $fillable = ['content','name','profession','video_id'];

    protected $guarded = [];

    use HasFactory;
}
