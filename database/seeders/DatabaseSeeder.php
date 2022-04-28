<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        Company::factory()->count(10)->create();
        Job::factory()->count(10)->create();
        
        $categorires = [
            'Technology',
            'Engineering',
            'Medical',
            'Constructive',
            'Software'
        ];
        foreach($categorires as $category){
            Category::create(['name'=>$category]);
        }
    }
}
