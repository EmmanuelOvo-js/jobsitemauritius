<?php

namespace App\Http\Controllers;

use App\Mail\SendCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendJob;

class EmailController extends Controller
{
    public function send(Request $request){

		//validate form
        // $this->validate($request,[
    	// 	'your_name'=>'required|string',
    	// 	'your_email'=>'required|email',
    	// 	'friend_name'=>'required|string',
    	// 	'friend_email'=>'required|email'
    	// ]);

		//Creating url to send job link via email from the page
    	$homeUrl = url('/');
    	$jobId = $request->get('job_id');
    	$jobSlug = $request->get('job_slug');

    	$jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

    	$data = [
    		'your_name'=>$request->get('your_name'),

    		'your_email'=>$request->get('your_email'),

    		'friend_name'=>$request->get('friend_name'),

    		'jobUrl'=>$jobUrl
			];

    	$emailTo = $request->get('friend_email');
    	try{
    		Mail::to($emailTo)->send(new SendJob($data));
    		return redirect()->back()->with('message','Job link sent to '.$emailTo);

    	}catch(\Exception $e){
    		return redirect()->back()->with('err_message','Sorry, Something went wrong. Please try again later');

    	}
    }

	public function contactform(Request $request){

		$homeUrl = url('/');

		$dataform = [
			'companyname'=>$request->get('companyname'),
			'email'=>$request->get('email'),
			'message'=>$request->get('message'),
			'homeUrl'=>$homeUrl
		];
		
		try{
			Mail::to('awefadae@gmail.com', 'Admin')->send(new SendCF($dataform));
			return redirect()->back()->with('message','Message sent Successfully');

    	}catch(\Exception){
    		return redirect()->back()->with('err_message','Sorry, Something went wrong. Please try again later');

    	}
	}

}
