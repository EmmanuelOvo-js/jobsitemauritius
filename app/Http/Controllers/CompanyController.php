<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //Jordan added middleware fro employer
    // use the 'except' to grant other users access to a route
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => ['index']]);
    }

    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        $jobs = Job::where('user_id', $id)->get();
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'phone' => 'required|min:10|numeric', //instaed of numeric you can use: (01)(0-9){9} starts with 01,9 characters
            'website' => 'required',
            'slogan' => 'required|max:20',
            'description' => 'required',


        ]);

        $user_id = auth()->user()->id;
        //the user id in the company profile table must be the same with the current logged in user (so that user can update info)
        Company::where('user_id', $user_id)->update([

            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),

        ]);
        return redirect()->back()->with('message', 'Company Profile Updated!');
    }

    //Update Company cover photo
    public function coverPhoto(Request $request)
    {

        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpeg,jpg|max:3000'

        ]);

        $user_id = auth()->user()->id;
        if ($request->hasfile('cover_photo')) {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/cover_photo', $filename);
            Company::where('user_id', $user_id)->update([

                'cover_photo' => $filename

            ]);
            return redirect()->back()->with('message', 'Company Photo Updated Successfully!');
        }

    }

    //Update Profile
    public function logo(Request $request)
    {

        $this->validate($request, [
            'logo' => 'required|mimes:png,jpeg,jpg|max:3000'

        ]);

        $user_id = auth()->user()->id;
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo', $filename);
            Company::where('user_id', $user_id)->update([

                'logo' => $filename

            ]);
            return redirect()->back()->with('message', 'Logo Updated Successfully!');
        }
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
