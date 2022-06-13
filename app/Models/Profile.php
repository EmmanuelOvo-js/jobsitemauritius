<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    // protected $fillable = ['user_id', 'gender', 'dob', 'address', 'experience', 'bio', 'cover_letter', 'resume', 'avatar'];

    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    use HasFactory;
}