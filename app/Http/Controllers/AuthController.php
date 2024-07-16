<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserService;
use App\Models\UserPortfolio;
use App\Models\FailedLogins;
use App\Models\UserCategory;
use App\Models\PostJobs;
use App\Models\PostUpskill;
use App\Models\JobLocation;
use App\Models\UserMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Image;

class AuthController extends Controller
{
    //
    public function home()
    {
        $user = auth()->user();
        if ($user) {
            $user_id = $user->id;
                $percentages = [
                    'UserEducation' => 20,
                    'UserExperience' => 20,
                    'UserSkill' => 20,
                    'UserService' => 20,
                    'UserPortfolio' => 20,
                    // 'user_roles' => 10,
                    // 'user_about' => 10,
                ];

                $allPercent = 0;

                foreach ($percentages as $model => $weight) {
                    $userModel = 'App\\Models\\' . $model;
                    $exists = $userModel::where('user_id', $user_id)->exists();

                    $allPercent += $exists ? $weight : 0;
                }             
                
                //-----check user's role and user's about
                $percent_role = $user->user_roles ? 10 : 0;
                $percent_about = $user->user_about ? 10 : 0;

                // Get all percentages
                $totalPercent = $allPercent + $percent_role + $percent_about;

                $categories = UserCategory::all();
                $postUpskill = PostUpskill::all();
                // $jobLocation = JobLocation::paginate(5);
                $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->paginate(5);
                $postJobAll = PostJobs::where('job_status', 'Open')
                ->orderBy('created_at', 'desc')
                ->get();
                $postJob = PostJobs::where('job_status', 'Open')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
                $totalRecords = PostJobs::count();

                $messages = UserMessage::where('to_user_id', '=', $user_id)   
                ->where('message_status', 'Unread')
                ->orderBy('created_at', 'desc')
                ->get();

                $unreadMessagesCount = $messages->count();
        return view('home', compact('categories','totalPercent','postJob','jobLocation','postUpskill'
                    ,'totalRecords','postJobAll','messages','unreadMessagesCount'));
        }
        else {
            $jobLocation = PostJobs::groupBy('job_location')
                ->selectRaw('job_location, COUNT(*) as location_count')
                ->paginate(5);
            $postUpskill = PostUpskill::all();
            $postJob = PostJobs::orderBy('created_at', 'desc')
            ->paginate(3);
            $postJobAll = PostJobs::where('job_status', 'Open')
                ->orderBy('created_at', 'desc')
                ->get();
            $categories = UserCategory::all();
            $totalRecords = PostJobs::count();
            return view('home', compact('categories','postJob','jobLocation','postUpskill',
            'totalRecords','postJobAll'));
        }            
            
    }

    public function login()
    {
        return view('auth.user-login');
    }

    public function signup()
    {
        $categories = UserCategory::all();
        return view('auth.user-signup', compact('categories'));
    }

    public function signupFreelancer()
    {
        return view('auth.user-signup-freelancer');
    }

    public function signupOrganization()
    {
        return view('auth.user-signup-organization');
    }

    public function signupAction(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'user_name' => 'required|string|max:20|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $email_token =Str::random(40);

            // Get the user's preferred username
            $preferredUsername = $validatedData['user_name'];

            // Generate a URL-friendly username
            $username = strtolower(str_replace(' ', '-', $preferredUsername));

            // Ensure the username is unique and not already in use
            $uniqueUsername = $username;
            $counter = 1;
            while (User::where('user_name', $uniqueUsername)->exists()) {
                $counter++;
                $uniqueUsername = $username . '-' . $counter;
            }

            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'user_name' => $validatedData['user_name'],
                'email_verified_status' => 0,
                'remember_token' => $email_token,
                'user_picture' => 'profile_pictures/blank.jpg',
                'user_url' => 'https://talentloom.kingsconsult.com.ng/'. $uniqueUsername,
                'user_name_link' =>  $uniqueUsername,
                'user_type' => 'Freelancer',
            ]);

            $email_message = "We have sent instructions to verify your email, kindly follow instructions to continue, 
            please check both your inbox and spam folder.";
            session(['email' => $validatedData['email']]);
            session(['full_name' => $validatedData['full_name']]);
            session(['email_token' => $email_token]);
            session(['email_message' => $email_message]);

            //return redirect()->route('login')->with('success', 'Account created successful.');
            return redirect('send-mail');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            Log::error('Error during user registration: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    public function signupOrgAction(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                // 'user_name' => 'required|string|max:20|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $email_token =Str::random(40);

            // Get the user's preferred username
            $preferredUsername = $validatedData['full_name'];

            // Generate a URL-friendly username
            $username = strtolower(str_replace(' ', '-', $preferredUsername));

            // Ensure the username is unique and not already in use
            $uniqueUsername = $username;
            $counter = 1;
            while (User::where('full_name', $uniqueUsername)->exists()) {
                $counter++;
                $uniqueUsername = $username . '-' . $counter;
            }

            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'user_name' => $validatedData['full_name'],
                'email_verified_status' => 0,
                'remember_token' => $email_token,
                'user_picture' => 'profile_pictures/blank.jpg',
                'user_url' => 'https://talentloom.kingsconsult.com.ng/'. $uniqueUsername,
                'user_name_link' =>  $uniqueUsername,
                'user_type' => 'Organization',
            ]);

            $email_message = "We have sent instructions to verify your email, kindly follow instructions to continue, 
            please check both your inbox and spam folder.";
            session(['email' => $validatedData['email']]);
            session(['full_name' => $validatedData['full_name']]);
            session(['email_token' => $email_token]);
            session(['email_message' => $email_message]);

            //return redirect()->route('login')->with('success', 'Account created successful.');
            return redirect('send-mail');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            Log::error('Error during user registration: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    public function loginAction(Request $request)
    {
        try {
            validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ])->validate();
                
            $userLog = User::where('email', $request->input('email'))->first();
            if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                //---check the no of attempts=====
                if($userLog->login_attempts < 5){
                    //--increment the number of attempts
                    $userLog->increment('login_attempts');
                    // Log the failed login attempt into the failed_logins table.
                    FailedLogins::create([
                    'ip_address' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                }
                elseif($userLog->login_attempts >= 5){
                    return redirect()->route('user-locked')->with('seconds', '60');
                }                
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed')
                ]);
            }            

            // User is authenticated at this point
            $user = Auth::user();
            //---reset the user login attempts----
            Auth::user()->update(['login_attempts' => 0]);
        
            if ($user->email_verified_status == 1) {
                // Email is verified, proceed with login 
                $request->session()->regenerate(); 
                $intendedUrl = session('url.intended', '/');
                return redirect()->intended($intendedUrl);
                // return redirect()->route('home');
            } else {                    
                // Email is not verified, return a flash message
                //Auth::logout(); // Log the user out since the email is not verified                    
                $email_address = $request->email;         
                 return view('auth.email-not-verify');
                 
            }
        } catch (ValidationException $e) {
            // Handle the validation exception
            // You can redirect back with errors or do other appropriate error handling
            return redirect()->route('login')->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Handle other exceptions, log them, and redirect to an error page
            Log::error('Error during login: ' . $e->getMessage());
            return redirect()->route('login');
        }    
    }

    

    //----update user profile
    public function profileUpdate(Request $request, string $id)
    {
        try {
            $user_type = auth()->user()->user_type;
            $validatedData = $request->validate([
                'full_name' => 'nullable|string|max:255',
                'user_name' => 'nullable|string|max:20|unique:users,user_name,' . $id,
                'user_phone' => 'nullable|numeric|unique:users,user_phone,' . $id,
                'country_code' => 'nullable|string',
                'user_category' => 'nullable|string',
                'user_about' => 'nullable|string|max_words:400',
            ], [
                'user_about.max_words' => 'The "About Yourself" field cannot exceed 400 words.',
            ]);
        
            // Get the user's preferred username
            $preferredUsername = $validatedData['user_name'];

            // Generate a URL-friendly username
            $username = strtolower(str_replace(' ', '-', $preferredUsername));

            // Ensure the username is unique and not already in use
            $uniqueUsername = $username;
            $counter = 1;
            while (User::where('user_name', $uniqueUsername)->exists()) {
                $counter++;
                $uniqueUsername = $username . '-' . $counter;
            }

            $user = User::findOrFail($id);
            $user->full_name = $validatedData['full_name'];
            $user->user_phone = $validatedData['user_phone'];
            $user->country_code = $validatedData['country_code'];
            $user->user_name = $validatedData['user_name'];
            $user->user_about = $validatedData['user_about'];
            $user->user_category = $validatedData['user_category'];
            $user->user_url = 'https://meetme.kingsconsult.com.ng/'.$uniqueUsername;
            $user->user_name_link =  $uniqueUsername;
        
            $user->save();
            if($user_type == 'Freelancer') {
                return redirect()->route('user-about')->with('success', 'Profile update successful.');
            }
            elseif($user_type == 'Organization') {
                return redirect()->route('user-about-organization')->with('success', 'Profile update successful.');
            }
            
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return with an error message
            \Log::error('Error updating user profile: ' . $e->getMessage());
            
            $errorMessage = 'Error updating user profile: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->route('user-about')->with('error', $errorMessage);
            //return redirect()->route('user-about')->with('error', 'An error occurred while updating your profile. Please try again.');
        }
        
    
    }

    //----update user profile
    public function profileUpdateSocial(Request $request, string $id)
    {
        try {
            $user_type = auth()->user()->user_type;
            $rules = [
                'user_facebook' => 'url|nullable',
                'user_instagram' => 'url|nullable',
                'user_twitter' => 'url|nullable',
                'user_linkedin' => 'url|nullable',
            ];
        
            $validatedData = $request->validate($rules);
        
            $user = User::findOrFail($id);
            $user->update($validatedData);
            
            if($user_type == 'Freelancer') {
                return redirect()->route('user-about')->with('success-new', 'Socials update successful.');
            }
            elseif($user_type == 'Organization') {
                return redirect()->route('user-about-organization')->with('success-new', 'Socials update successful.');
            }           
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return with an error message
            \Log::error('Error updating social links: ' . $e->getMessage());
        
            return redirect()->route('user-about')->with('error', 'An error occurred while updating your social links. Please try again.');
        }        
    
    }

    public function profilePicture()
    {
        $user_id = auth()->user()->id;
        //---All Messages --------------------------------
        $userMessages = UserMessage::where('to_user_id', $user_id)
        ->paginate(5);
        //---Unread Messages --------------------------------
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.user-profile-picture', compact('unreadMessagesCount', 'messages','userMessages'));

    }

    //update profile picture
    public function profilePictureUpdate(Request $request)
    {
        $user = auth()->user();

        try {
            if ($request->hasFile('profile_picture')) {
                $userPictureFile = $request->file('profile_picture');
                $profilePictureFile = $request->file('profile_picture');
        
                $username = $user->user_name_link; // Get the user's username
        
                // Generate filenames for both pictures
                $userPictureFilename = $username . '_user_picture.' . $userPictureFile->getClientOriginalExtension();
                $profilePictureFilename = $username . '_profile_picture.' . $profilePictureFile->getClientOriginalExtension();
        
                // Store both pictures with the customized filenames
                $userPicturePath = $userPictureFile->storeAs('profile_pictures', $userPictureFilename, 'public');
                $profilePicturePath = $profilePictureFile->storeAs('profile_pictures', $profilePictureFilename, 'public');
        
                // Resize and save the user_picture
                $userPicture = Image::make(public_path('storage/' . $userPicturePath));
                $userPicture->fit(300, 300); // Adjust dimensions as needed
                $userPicture->save();
        
                // Resize and save the profile_picture
                $profilePicture = Image::make(public_path('storage/' . $profilePicturePath));
                $profilePicture->fit(668, 690); // Adjust dimensions as needed
                $profilePicture->save();
        
                // Update user's profile pictures in the database
                $user->user_picture = $userPicturePath;
                $user->profile_picture = $profilePicturePath;
                $user->save();
        
                return redirect()->route('profile-picture')->with('success', 'Profile picture updated successfully.');
            }
        
            return redirect()->route('profile-picture')->with('error', 'Both user and profile picture must be provided.');
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return with an error message
            \Log::error('Error updating profile pictures: ' . $e->getMessage());
        
            return redirect()->route('profile-picture')->with('error', 'An error occurred while updating profile pictures. Please try again.');
        }  

    }   
    

    public function changePassword(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('forgot-password');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');


    }
    
    public function userLocked()
    {
        return view('auth.locked-out')->with('seconds', '60');
    }
}