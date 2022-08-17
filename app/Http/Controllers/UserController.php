<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Jordan added middleware for employer
    public function __construct()
    {
        $this->middleware(['seeker', 'verified'], ['except' => ['about','contact']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|min:10|numeric', //instaed of numeric you can use: (01)(0-9){9} starts with 01,9 characters
            'experience' => 'required|min:25',
            'bio' => 'required|min:25',
            
             
        ]);

        $user_id = auth()->user()->id;
        //the user id in the profile table must be the same with the current logged in user (so that user can update info)
        Profile::where('user_id',$user_id)->update([

            'address'=>request('address'),
            'phone_number'=>request('phone_number'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),

        ]);
        return redirect()->back()->with('message','Profile Successfully Updated!');
    }

    //Update Cover Letter
    public function coverletter(Request $request){

        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:2000'

        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        //update cover letter in profile (logged in user)
        Profile::where('user_id', $user_id)->update([

            'cover_letter' => $cover

        ]);
        return redirect()->back()->with('message', 'Cover Letter Successfully Updated!');
    }

    //Update Resume
    public function resume(Request $request){

        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:2000'

        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        //update cover letter in profile (logged in user)
        Profile::where('user_id', $user_id)->update([

            'resume' => $resume

        ]);
        return redirect()->back()->with('message', 'Resume Successfully Updated!');
    }

    //Update Profile
    public function avatar(Request $request){

        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpeg,jpg|max:3000'

        ]);

        $user_id = auth()->user()->id;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar',$filename);
            Profile::where('user_id', $user_id)->update([

                'avatar' => $filename

            ]);
            return redirect()->back()->with('message', 'Profile Picture Successfully Updated!');
        }
        
      
    }

    public function about(){
        return view('about.index');
    }

    public function contact(){
        return view('contact.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
