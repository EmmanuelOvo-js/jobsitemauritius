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
        User::factory()->count(12)->create();
        Company::factory()->count(12)->create();
        Job::factory()->count(12)->create();
        
        $categorires = [
            'Technology',
            'Engineering',
            'Medical',
            'Constructive',
            'Software',
            'Accounting / Finance',
            'Automative Jobs',
            'Construction / Facilities',
            'Telecommunications',
            'Healthcare',
            'Design, Art & Multimedia',
            'Transportation & Logistics',
            'Restaurant / Food Service',
        ];
        foreach($categorires as $category){
            Category::create(['name'=>$category]);
        }
    }
}
