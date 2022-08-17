<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
		$testimonials = Testimonial::latest()->paginate(10);
		return view('testimonial.index',compact('testimonials'));
	}

    public function create(){
    	return view('testimonial.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'content'=>'required|min:40|max:500',
    		'name'=>'required',
    		'profession'=>'required',
    		'video_id'=>'required|integer'
    	]);
    	Testimonial::create([

    		'content'=>$request->get('content'),
    		'name'=>$request->get('name'),
    		'profession'=>$request->get('profession'),
    		'video_id'=>$request->get('video_id')
    	]);
    	return redirect()->back()->with('message','Testimonial created successfully');
    }

	public function edit($id){
		$testimonials = Testimonial::findOrFail($id);
		return view('testimonial.edit', compact('testimonials'));
	}

	public function update($id, Request $request){
		$this->validate($request,[
			'content'=>'required|min:40|max:500',
    		'name'=>'required',
    		'profession'=>'required',
    		'video_id'=>'required|integer'
		]);

		Testimonial::where('id', $id)->update([
			'content'=>$request->get('content'),
    		'name'=>$request->get('name'),
    		'profession'=>$request->get('profession'),
    		'video_id'=>$request->get('video_id')
		]);
		return redirect()->back()->with('message', 'Testimonial Updated Successfully');
	}

	public function destroy(Request $request){
		$id = $request->get('id');
		$testimonial = Testimonial::find($id);
		$testimonial->delete();
		return redirect()->back()->with('message', 'Testimonial Deleted Successfully');
	}
}
