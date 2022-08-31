<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\http\Requests\JobPostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Testimonial;

class JobController extends Controller
{
    //Jordan added middleware fro employer
    // use the 'except' to grant other users access to a route
    public function __construct()
    {
        $this->middleware(['employer','verified'],['except'=>['index','show', 'apply', 'allJobs','searchJobs','category']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jobs = Job::all()->take(20); //view only 10 from the database
        // $jobs = Job::orderBy('created_at', 'desc')->get()->take('10');
        //show live jobs where stutus=live==1,draft==2.
        // $companies = Company::latest()->limit(8)->get();
        //for ajax pagination -- not working
        // $data = DB::table('categories')->paginate(12); --no working

       // $jobs = Job::latest()->limit(10)->where('status',1)->get();
        //To filter expired jobs
        $jobs = Job::latest()
                ->whereDate('last_date','>',date('Y-m-d'))
                ->limit(10)->where('status',1)
                ->get();

        $categories = Category::with('jobs')->take(12)->get();
        $posts = Post::where('status',1)->get(); //getting the posts that the status is 1. 1==live, 2==draft.
        $testimonial = Testimonial::orderBy('id','DESC')->first(); //Show 1 testimonail on main homepage
        $companies = Company::get()->random(6);
        return view('welcome', compact('jobs', 'companies','categories','posts','testimonial'));
    }

    // public function fetch_data(Request $request){
    //     if($request->ajax()){
    //         // $data = DB::table('categories')->paginate(12); --no working
    //         return view('welcome', compact('categories'))->render();
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request)
    {
       
        // i am using another way to validate (laravel validation) this form. php artisan make:request JobPostRequest

        $user_id = auth()->user()->id;
        //the user id in the Create job table must be the same with the current logged in user (so that user can update info)
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([

            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            // 'gender'=>request('gender'),
            'experience'=>request('experience'),
            'salary'=>request('salary'),

        ]);
        return redirect()->back()->with('message', 'Job Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Job $job)
    {
        $job = Job::find($id);
        //dd($job);
        $jobRecommendations = $this->jobRecommendations($job);
        return view('jobs.show', compact('job','jobRecommendations'));
    }

    public function jobRecommendations($job){
        $data = [];
        
        $jobsBasedOnCategories = Job::latest()->where('category_id',$job->category_id)
                             ->whereDate('last_date','>',date('Y-m-d'))
                             ->where('id','!=',$job->id)
                             ->where('status',1)
                             ->limit(6)
                             ->get();
        array_push($data,$jobsBasedOnCategories);
                           
        $jobBasedOnCompany = Job::latest()
                                ->where('company_id',$job->company_id)
                                ->whereDate('last_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6)
                                ->get();
            array_push($data,$jobBasedOnCompany);

        $jobBasedOnPosition= Job::where('position','LIKE','%'.$job->position.'%')                 
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6);
            array_push($data,$jobBasedOnPosition);

       $collection  = collect($data); //colect all data
       $unique = $collection->unique("id"); // filter duplicated data and show unique data based on id
       $jobRecommendations =  $unique->values()->first();
       return $jobRecommendations;
    }

    public function myjobs()
    {
        $jobs = Job::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('jobs.myjobs', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    
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
        // Easy way to update records. Using a different way to update records
        $job = Job::findOrFail($id); 
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job Successfully Updated!');
        
    }

    public function applicant()
    {
        // checks
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->paginate(10);
        return view('jobs.applicants',compact('applicants'));
        
    }

    public function allJobs(Request $request){

        
         //front search
         $position = $request->get('position');
         $address = $request->get('address');
         if($position&&$address){
            $jobs = Job::where('position','LIKE','%'.$position.'%')
                        ->where('address','LIKE','%'.$address.'%')
                        ->paginate(10);
 
             return view('jobs.alljobs',compact('jobs'));
 
         }
 

        //added for search form in alljobs view
        $keyword = $request->get('position');
        // $keywords = request('title'); You can also do it this way.
        $type = $request->get('type');
        // $category = $request->get('category_id');
        $address = $request->get('address');
        if ($keyword||$type||$address){
            $jobs = Job::where('position','LIKE','%'.$keyword.'%')
                        ->where('type','LIKE','%'.$type.'%')
                        // ->where('category_id', $category)
                        ->where('address','LIKE','%'.$address.'%')
                        ->paginate(10);

                    return view('jobs.alljobs',compact('jobs'));                    
        }

        else
        { // show all latest post on the page. do not forget jordan
            $jobs = Job::latest()->paginate(20);
            return view('jobs.alljobs',compact('jobs'));
        }
        //end search

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $id = $request->get('id');
        $jobs = Job::find($id);
        $jobs->delete();
        return redirect()->back()->with('message','Job deleted successfully');
 }

    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application sent');
    }

    // Autocomplete search method for vue_js did not work
    // public function searchJobs(Request $request){
       
    //     $keyword = $request->get('keyword');
    //     $users = Job::where('title','like','%'.$keyword.'%')
    //             ->orWhere('position','like','%'.$keyword.'%')
    //             ->limit(5)->get();
    //     return response()->json($users);

    // }
 
}