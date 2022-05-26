<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        'number_of_vacancy',
        'experience',
        'gender',
        'salary',
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

    //Checking if currently logged in ID exists in database, job_user table
    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id',auth()->user()->id)->where
        ('job_id', $this->id)->exists();
        
    }

    //check vue_js
    public function favorites(){
        return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimeStamps();
    }

     //Checking if currently logged in ID exists in database, favourites table
     public function checkSaved(){
        return DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }


    use HasFactory;
}
