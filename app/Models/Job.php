<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'user_id',
        'company_id',
        'title',
        'slug',
        'description',
        'roles',
        'category_id',
        'position',
        'address',
        'type',
        'status',
        'last_date',
    ];


    
            
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    //Checking if logged in user exists in job_user table
    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id',auth()->user()->id)->where
        ('job_id', $this->id)->exists();
        
    }



    use HasFactory;
}
