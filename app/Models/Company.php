<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Company extends Model
{
    // protected $fillable =[
    //     'cname','user_type','slug','address','phone','website','logo','cover_photo','slogan','description'
    // ];

    protected $guarded =[];

    

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function job(){
        return $this->hasMany('App\Models\Job');
    }

    // public function jobs()
    // {
    //     return $this->hasMany(Job::class);
    // }
    use HasFactory;
}
