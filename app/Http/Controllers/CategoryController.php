<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id){
    	$jobs = Job::where('category_id',$id)->paginate(20);
    	$categoryName = Category::where('id',$id)->first();
    	return view('jobs.jobs-category', compact('jobs','categoryName'));
    }

	public function allcategory(Request $request){

		$category = $request->get('name');

		if ($category){
			$categories = Category::where('name','LIKE','%'.$category.'%')
						->paginate(10);
		
					return view('partials.allcategory',compact('categories'));                    
		}
	   else
	   { // show all latest post on the page. do not forget jordan
		$categories = Category::with('jobs')->paginate(12);
		return view('partials.allcategory', compact('categories'));
	   }
	   //end search

   }
}
