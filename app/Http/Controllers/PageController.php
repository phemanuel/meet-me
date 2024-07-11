<?php

namespace App\Http\Controllers;
use App\Models\UserCategory;
use App\Models\PostJobs;
use App\Models\PostUpskill;
use App\Models\JobLocation;
use App\Models\JobApply;
use App\Models\User;
use App\Models\UserRoles;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    //

    public function giveReview()
    {
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.give-review', compact('unreadMessagesCount', 'messages'));
    }

    public function paymentSetup()
    {
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.payment', compact('unreadMessagesCount', 'messages'));
    }

    public function jobCategory($category)
    {
        $categories = UserCategory::all();
        $postUpskill = PostUpskill::all();
        $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->WHERE('job_status', 'Open')
                ->paginate(10);
        $postJobs = PostJobs::where('job_category', $category)
                ->WHERE('job_status', 'Open')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        //$postJobs = PostJobs::paginate(5); 
        return view('dashboard.job-category' , compact('categories', 'postJobs','jobLocation','postUpskill','category'));

    }

    public function viewJob($id)
    {
        $categories = UserCategory::all();
        $postUpskill = PostUpskill::all();
        $postJobs = PostJobs::where('id', $id)
        ->where('job_status', 'Open')
        ->first();
        $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->WHERE('job_status', 'Open')
                ->paginate(10);
        $postJobs->increment('no_of_views');
        // Store the intended URL in the session
        $url = "view-job/{$id}";
        session(['url.intended' => $url]);
        return view('dashboard.view-job', compact('postJobs','jobLocation','categories','postUpskill'));
    }

    public function viewUpskill($id)
    {
        $categories = UserCategory::all();
        $postJobs = PostJobs::where('job_status', 'Open')
        ->orderBy('created_at', 'desc')
        ->get();;
        $postUpskill = PostUpskill::where('id', $id)->first();
        $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->WHERE('job_status', 'Open')
                ->paginate(10);
        $postUpskill->increment('no_of_views');
        // Store the intended URL in the session
        $url = "view-upskill/{$id}";
        session(['url.intended' => $url]);
        return view('dashboard.view-upskill', compact('postJobs','jobLocation','categories','postUpskill'));
    }

    public function jobLocation($id)
    {
        $categories = UserCategory::all();        
        $postUpskill = PostUpskill::all();
        $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->WHERE('job_status', 'Open')
                ->paginate(10); 
        $postJobs = PostJobs::where('job_location', $id)
        ->where('job_status', 'Open')
        ->paginate(5);

        return view('dashboard.view-job-location', compact('jobLocation','categories','postUpskill'
        ,'postJobs', 'id'));
    }

    public function jobApply($id)
    {
        $user = auth()->user();

        if ($user) {
            $jobApplyId = $id;
            $userId = $user->id;

            // Check if the user has applied for the job
            $existingApplication = JobApply::where('job_id', $jobApplyId)
                ->where('user_id', $userId)
                ->where('apply_type', 'Job-Application')
                ->exists();

            if ($existingApplication) {
                // User has already applied for this job                
                return redirect()->route('home')->with('error', 'You have already applied for this job, keep checking
                your email for updates from the recruiter.');
            }

            // Proceed with the job application process
            $jobApply = JobApply::create([
                'job_id' => $jobApplyId,
                'user_id' => $userId,
                'apply_type' => 'Job-Application',
            ]);

            $postJobs = PostJobs::where('id', $id)->first();
            $postJobs->increment('job_apply');

            // return redirect('send-mail');
            return redirect()->route('home')->with('success', 'Job application successful, keep checking your email for updates.');
        } else {
            return redirect()->route('login')->with('error', 'You need to login before you can apply for the job.');
        }
    }


    public function upskillApply($id)
    {
        $user = auth()->user();

        if ($user) {
            $upskillApplyId = $id;
            $userId = $user->id;

            // Check if the user has applied for the job
            $existingApplication = JobApply::where('job_id', $upskillApplyId)
                ->where('user_id', $userId)
                ->where('apply_type', 'Upskill-Application')
                ->exists();

            if ($existingApplication) {
                // User has already applied for this job                
                return redirect()->route('home')->with('error', 'You have already applied for this upskill, keep checking
                your email for updates.');
            }

            // Proceed with the job application process
            $upskillApply = JobApply::create([
                'job_id' => $upskillApplyId,
                'user_id' => $userId,
                'apply_type' => 'Upskill-Application',
            ]);

            $postUpskill = PostUpskill::where('id', $id)->first();
            $postUpskill->increment('upskill_apply');

            return redirect()->route('home')->with('success', 'Upskill application successful, keep checking your email for updates.');
        } else {

            return redirect()->route('login')->with('error', 'You need to login before you can apply for the upskill.');
        }
    }

    public function findUpskill()
    {
        $categories = UserCategory::all();
        $postUpskill = PostUpskill::paginate(5);
        $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->paginate(10);    
        $postJobs = PostJobs::all();    
       
        return view('dashboard.find-upskill' , compact('categories', 'postJobs','jobLocation','postUpskill'));
    }

    public function findFreelancer()
    {    
        $user = auth()->user();
       
        if($user){
            $user_id = $user->id;
            $allFreelancer = User::where('user_type', 'Freelancer')->paginate(20); 
        $userRoles = UserRoles::all();
        $categories = UserCategory::all();
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();
        $unreadMessagesCount = $messages->count();

        return view('dashboard.find-freelancer', compact('allFreelancer','userRoles','categories',
        'messages','unreadMessagesCount'));
        }  
        else{
            $allFreelancer = User::where('user_type', 'Freelancer')->paginate(20); 
        $userRoles = UserRoles::all();
        $categories = UserCategory::all();

        return view('dashboard.find-freelancer', compact('allFreelancer','userRoles','categories'));
        }        

    }

    public function searchJobs(Request $request)
    {

        try {
            $request->validate([
                'job_title' => 'nullable|string',
                'job_category' => 'nullable|string',
            ]);

            $jobTitle = $request->input('job_title');
            $jobCategory = $request->input('job_category');

            $Jobs = PostJobs::when($jobTitle, function ($query) use ($jobTitle) {
                    return $query->where('job_name', 'like', '%' . $jobTitle . '%');
                })
                ->when($jobCategory, function ($query) use ($jobCategory) {
                    return $query->where('job_category', 'like', '%' . $jobCategory . '%');
                })
                ->where('job_status', 'Open')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            $categories = UserCategory::all();
            $postUpskill = PostUpskill::all();
            $jobLocation = PostJobs::groupBy('job_location')
                    ->selectRaw('job_location, COUNT(*) as location_count')
                    ->where('job_status', 'Open')
                    ->paginate(10);

            return view('dashboard.job-search', compact('Jobs', 'categories', 'jobLocation', 'postUpskill'));
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Validation failed'], 422);
        } catch (\Exception $e) {
            Log::error('An exception occurred: ' . $e->getMessage());
            return view('dashboard.job-not-found',compact('categories'));
        }


    }

    public function Freelancer(Request $request)
    {
        $query = $request->get('query');
        $allFreelancer = User::where('user_type', 'Freelancer')
            ->where(function($q) use ($query) {
                $q->where('full_name', 'LIKE', "%{$query}%")
                  ->orWhere('user_roles_major', 'LIKE', "%{$query}%");
            })
            ->get();

        $output = '';

        if ($allFreelancer->count() > 0) {
            foreach ($allFreelancer as $allFreelancers) {
                if (auth()->check() && $allFreelancers->id === auth()->user()->id) {
                    continue;
                }
                $output .= '
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-statistics employees-contant px-2">
                        <div class="card-body pb-5 pt-4">
                            <div class="text-center">
                                <div class="text-right">
                                    <h4><span class="badge badge-primary badge-pill px-3 py-2">$0/hr</span></h4>
                                </div>
                                <div class="pt-1 bg-img m-auto">
                                    <img src="'. asset('storage/' . $allFreelancers->user_picture) .'" class="img-fluid" alt="employees-img">
                                </div>
                                <div class="mt-3 employees-contant-inner">
                                    <h4 class="mb-1">'. $allFreelancers->full_name .'</h4>
                                    <h5 class="mb-0 text-muted">'. $allFreelancers->user_roles_major .'</h5>
                                    <div class="mt-3">';
                                        $userRoles = $allFreelancers->user_roles;
                                        $rolesArray = explode(',', $userRoles);
                                        $maxDisplay = 2;

                                        if (!empty($rolesArray)) {
                                            foreach ($rolesArray as $index => $userRole) {
                                                if ($index < $maxDisplay) {
                                                    $output .= '<span class="badge badge-pill badge-success-inverse px-3 py-2">'. trim($userRole) .'</span>';
                                                }
                                            }
                                            if (count($rolesArray) > $maxDisplay) {
                                                $output .= '<span class="badge badge-pill badge-warning-inverse px-3 py-2">+'. (count($rolesArray) - $maxDisplay) .'</span>';
                                            }
                                        } else {
                                            $output .= '<div class="alert alert-warning" role="alert">
                                                            <span class="badge badge-pill badge-success-inverse px-3 py-2">N/A</span>                                                              
                                                        </div>';
                                        }
                                        $output .= '<hr>
                                        <div class="text-center">
                                            <a class="btn btn-primary" href="'. $allFreelancers->user_url .'">View Profile</a>
                                            <a class="btn btn-success" href="#">Send Message</a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            $output .= '<p>Freelancers unavailable.</p>';
        }

        return response($output);
    }
}
