<?php

namespace App\Http\Controllers;
use App\Models\UserRoles;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserService;
use App\Models\Countries;
use App\Models\UserCategory;
use App\Models\UserPortfolio;
use App\Models\PostJobs;
use App\Models\PostUpskill;
use App\Models\JobLocation;
use App\Models\JobApply;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user_id = auth()->user()->id;
        $countries = Countries::all();
        $categories = UserCategory::all();
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.dashboard', compact('countries','categories','messages','unreadMessagesCount'));        
    }
    
    public function userRole()
    {
        $user = auth()->user();
        $user_id = $user->id;
            
        $allRoles = UserRoles::all(); // Retrieve all roles from the database
        $user = auth()->user(); // Get the authenticated user
        $userRoles = explode(',', $user->user_roles); // Convert the user's saved roles to an array
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.user-roles')->with([
            'allRoles' => $allRoles,
            'userRoles' => $userRoles,
            'messages' => $messages,
            'unreadMessagesCount' => $unreadMessagesCount,
        ]);
    }    

    public function userRoleSave(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'user_roles_major' => 'required|string',
                'user_roles' => 'required|array|valid_roles|max_roles:6',
            ], [
                'user_roles.valid_roles' => 'One or more selected roles are invalid.',
            ],
                [
                    'user_roles.max_roles' => 'You cannnot select more than 6 roles.',                
            ]);
            
            // Process the selected roles and save them in the database
            $userRoles = implode(',', $validatedData['user_roles']);

            $user = User::findOrFail($id);
            $user->user_roles = $userRoles;
            $user->user_roles_major = $validatedData['user_roles_major'];
            $user->save();
        
            return redirect()->route('user-role')->with('success', 'Roles update successful.');
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return with an error message
            //$errorMessage = 'Error-save user role: ' . $e->getMessage();
            $errorMessage = 'You cannot select more than 6 roles.';
            Log::error($errorMessage);
            
            return redirect()->route('user-role')->with('error', $errorMessage);
        }
    }    

    public function userSkill()
    {
        try {
            $user = auth()->user();
            $user_id = $user->id;    
            
            $userSkills = UserSkill::where('user_id', $user_id)
            ->paginate(5);
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.user-skills', compact('userSkills','messages','unreadMessagesCount'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user skill: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-skill')->with('error', 'An error occurred while retrieving user skills.');
        }
    
    }

    public function userSkillSave(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'user_skill' => 'required|string',
                'user_skill_level' => 'required|string',
            ]);            

            $user = UserSkill::create([
                'user_id' => $validatedData['user_id'],
                'user_skill' => $validatedData['user_skill'],
                'user_skill_level' => $validatedData['user_skill_level'],
            ]); 

            return redirect()->route('user-skill')->with('success', 'Skill added successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user skill: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during skill update. Please try again.');
        }
    }

    public function deleteUserSkill($id)
    {
        try {
            $userSkill = UserSkill::findOrFail($id);
            $userSkill->delete();

            return redirect()->route('user-skill')->with('success-new', 'Skill deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user skill: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('user-skill')->with('error-new', 'Failed to delete skill.');
        }
    }

    public function editUserSkill($id)
    {
        try {  
            $userSkill = UserSkill::findOrFail($id);
    
            return view('dashboard.edit-user-skill', compact('userSkill'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit user skill: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-user-skill')->with('error', 'An error occurred while retrieving user skill.');
        }
    }

    public function updateUserSkill(Request $request, $id)
    {
        try {
            // Validate the request data as needed
            $validatedData = $request->validate([                
                'user_skill' => 'required|string',
                'user_skill_level' => 'required|string',                
            ]);

            // Retrieve the user skill based on the $id
            $userSkill = UserSkill::findOrFail($id);

            // Update the user skill attributes based on the request data
            $userSkill->update([
                'user_skill' => $validatedData['user_skill'],
                'user_skill_level' => $validatedData['user_skill_level'],
                // Add more fields if necessary
            ]);

            // Redirect to the user's skill list or another appropriate page
            return redirect()->route('user-skill')->with('success-new', 'Skill updated successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-update user skill: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle any exceptions or errors here
            return back()->with('error', 'An error occurred while updating the skill. Please try again.');
        }
    }

    public function userEducation()
    {
        try {
            $user = auth()->user();
            $user_id = $user->id;    
            
            $userEducations = UserEducation::where('user_id', $user_id)
            ->paginate(4);
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.user-education', compact('userEducations','messages', 'unreadMessagesCount'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user education: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-education')->with('error', 'An error occurred while retrieving user education history.');
        }
        
    }

    public function userEducationSave(Request $request)
    {
        $user = auth()->user();

        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'college_name' => 'required|string|max:255',
                'college_year' => 'required|string',
                'college_qualification' => 'required|string|max:255',
                'college_certificate' => 'nullable|mimes:pdf',
            ]);            

            if ($request->hasFile('college_certificate')) {
                $userCertificateFile = $request->file('college_certificate');
        
                $username = $user->user_name; // Get the user's username
        
                // Generate filenames 
                $collegeYear = $validatedData['college_year'];
                $collegeQualification = substr($validatedData['college_qualification'], 0, 5);
                $collegeName = substr($validatedData['college_name'], 0, 5);
                //----                
                $collegeName = str_replace(' ', '', $collegeName);
                $collegeQualification = str_replace(' ', '', $collegeQualification);
                $userCertificateFilename = $username . '_'. $collegeYear . '_' . $collegeQualification . '_' . $collegeName . '.' . $userCertificateFile->getClientOriginalExtension();
                
                // Store file
                $certificatePath = $userCertificateFile->storeAs('certificates', $userCertificateFilename, 'public');
                } else {
                $certificatePath = null; // If no file was uploaded
            }
            
            $userEducation = UserEducation::create([
                'user_id' => $validatedData['user_id'],
                'college_name' => $validatedData['college_name'],
                'college_year' => $validatedData['college_year'],
                'college_qualification' => $validatedData['college_qualification'],
                'college_certificate' => $certificatePath,
            ]); 

            return redirect()->route('user-education')->with('success', 'Education/Certification added successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user education: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during Education/Certification update. Please try again.');
        }

    }  

    public function editUserEducation($id)
    {
        try {  
            $userEducations = UserEducation::findOrFail($id);
    
            return view('dashboard.edit-user-education', compact('userEducations'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit user education: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-user-education')->with('error', 'An error occurred while retrieving user education history.');
        }
    }    

    public function updateUserEducation(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'college_name' => 'required|string',
                'college_year' => 'required|string',
                'college_qualification' => 'required|string',
                'college_certificate' => 'nullable|mimes:pdf', 
            ]);

            // Retrieve the user education based on the $id
            $userEducation = UserEducation::findOrFail($id);

            if ($request->hasFile('college_certificate')) {
                // Handle the new certificate file
                $userCertificateFile = $request->file('college_certificate');
                $user = auth()->user();
                $username = $user->user_name; // Get the user's username

                // Generate filenames 
                $collegeYear = $validatedData['college_year'];
                $collegeQualification = substr($validatedData['college_qualification'], 0, 5);
                $collegeName = substr($validatedData['college_name'], 0, 5);
                //----                
                $collegeName = str_replace(' ', '', $collegeName);
                $collegeQualification = str_replace(' ', '', $collegeQualification);
                $userCertificateFilename = $username . '_'. $collegeYear . '_' . $collegeQualification . '_' . $collegeName . '.' . $userCertificateFile->getClientOriginalExtension();
                
                // Store file
                $certificatePath = $userCertificateFile->storeAs('certificates', $userCertificateFilename, 'public');
                
                // Update the certificate field in the database
                $userEducation->college_certificate = $certificatePath;
            }

            // Update other education attributes based on the request data
            $userEducation->update([
                'college_name' => $validatedData['college_name'],
                'college_year' => $validatedData['college_year'],
                'college_qualification' => $validatedData['college_qualification'],
            ]);

            // Redirect to the user's education list or another appropriate page
            return redirect()->route('user-education')->with('success', 'Education/Certification updated successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-update user education: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle any exceptions or errors here
            return back()->with('error', 'An error occurred while updating the Education/Certification. Please try again.');
        }
    }


    public function deleteUserEducation($id)
    {
        try {
            $userEducation = UserEducation::findOrFail($id);
            $userEducation->delete();

            return redirect()->route('user-education')->with('success-new', 'Education/Certification deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user education: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('user-education')->with('error-new', 'Education/Certification.');
        }
    }

    public function userExperience()
    {
        try {
            $user = auth()->user();
            $user_id = $user->id;    
            
            $userExperiences = UserExperience::where('user_id', $user_id)
            ->orderBy('company_year', 'desc')
            ->paginate(5);
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.user-experience', compact('userExperiences','messages','unreadMessagesCount'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user experience: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-experience')->with('error', 'An error occurred while retrieving user education history.');
        }
    }

    public function userExperienceSave(Request $request)
    {
        
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'user_company' => 'required|string|max:255',
                'company_year' => 'required|string',
                'user_company_role' => 'required|string',
                'user_about_role' => 'required|string|max_words:50',
            ], [
                'user_about_role.max_words' => 'The "About Role" field cannot exceed 80 words.',
            ]);
            
            // return response()->json([
            //     'status_code' => 200,
            // ]);
            $userExperience = UserExperience::create([
                'user_id' => $validatedData['user_id'],
                'user_company' => $validatedData['user_company'],
                'company_year' => $validatedData['company_year'],
                'user_company_role' => $validatedData['user_company_role'],
                'user_about_role' => $validatedData['user_about_role'],
            ]);
    
             return redirect()->route('user-experience')->with('success', 'Work experience added successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user experience: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->route('user-experience')->with('error', $errorMessage);
           
            //return redirect()->back()->with('error', 'An error occurred during work experience update. Please try again.');
        }

    }

    public function deleteUserExperience($id)
    {
        try {
            $userExperience = UserExperience::findOrFail($id);
            $userExperience->delete();

            return redirect()->route('user-experience')->with('success-new', 'work experience deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user experience: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('user-experience')->with('error-new', 'work experience.');
        }
    }

    public function editUserExperience($id)
    {
        try {  
            $userExperiences = UserExperience::findOrFail($id);
    
            return view('dashboard.edit-user-experience', compact('userExperiences'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit user experience: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-user-experience')->with('error', 'An error occurred while retrieving user work experience.');
        }
    }   

    public function updateUserExperience(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'user_company' => 'required|string|max:255',
                'company_year' => 'required|string',
                'user_company_role' => 'required|string',
                'user_about_role' => 'required|string|max_words:50',
            ], [
                'user_about_role.max_words' => 'The "About Role" field cannot exceed 80 words.',
            ]);

            // Retrieve the user education based on the $id
            $userExperience = UserExperience::findOrFail($id);            

            // Update other education attributes based on the request data
            $userExperience->update([
                'user_company' => $validatedData['user_company'],
                'company_year' => $validatedData['company_year'],
                'user_company_role' => $validatedData['user_company_role'],
                'user_about_role' => $validatedData['user_about_role'],
            ]);

            // Redirect to the user's education list or another appropriate page
            return redirect()->route('user-experience')->with('success', 'work experience updated successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-update user experience: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle any exceptions or errors here
            return back()->with('error', 'An error occurred while updating the work experience. Please try again.');
        }
    }  

    public function userService()
    {
        try {
            $user = auth()->user();
            $user_id = $user->id;    
            
            $userServices = UserService::where('user_id', $user_id)
            ->orderBy('user_service', 'desc')
            ->paginate(5);
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.user-service', compact('userServices','messages','unreadMessagesCount'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user service: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-service')->with('error', 'An error occurred while retrieving user service history.');
        }
    }

    public function userServiceSave(Request $request)
    {
        
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',  
                'user_service' => 'required|string',               
                'user_service_description' => 'required|string|max_words:30',
            ], [
                'user_service_description.max_words' => 'The "About Service" field cannot exceed 30 words.',
            ]);
          
            $userService = UserService::create([
                'user_id' => $validatedData['user_id'],
                'user_service' => $validatedData['user_service'],
                'user_service_description' => $validatedData['user_service_description'],
            ]);
    
             return redirect()->route('user-service')->with('success', 'Service added successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user service: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->route('user-service')->with('error', $errorMessage);
           
            //return redirect()->back()->with('error', 'An error occurred during work experience update. Please try again.');
        }

    }

    public function deleteUserService($id)
    {
        try {
            $userService = UserService::findOrFail($id);
            $userService->delete();

            return redirect()->route('user-service')->with('success-new', 'service deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user service: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('user-service')->with('error-new', 'service.');
        }
    }

    public function editUserService($id)
    {
        try {  
            $userServices = UserService::findOrFail($id);
    
            return view('dashboard.edit-user-service', compact('userServices'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit user service: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-user-service')->with('error', 'An error occurred while retrieving user services.');
        }
    }   

    public function updateUserService(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'user_id' => 'required|integer',  
                'user_service' => 'required|string',               
                'user_service_description' => 'required|string|max_words:30',
            ], [
                'user_service_description.max_words' => 'The "About Service" field cannot exceed 30 words.',
            ]);

            // Retrieve the user education based on the $id
            $userService = UserService::findOrFail($id);            

            // Update other education attributes based on the request data
            $userService->update([
                'user_service' => $validatedData['user_service'],
                'user_service_description' => $validatedData['user_service_description'],
            ]);

            // Redirect to the user's education list or another appropriate page
            return redirect()->route('user-service')->with('success', 'service updated successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-update user service: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle any exceptions or errors here
            return back()->with('error', 'An error occurred while updating the service. Please try again.');
        }
    }  

    public function userPortfolio()
    {
        try {
            $user = auth()->user();
            $user_id = $user->id;    
            
            $userPortfolios = UserPortfolio::where('user_id', $user_id)
            ->paginate(5);
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadMessagesCount = $messages->count();
    
            return view('dashboard.user-portfolio', compact('userPortfolios','messages','unreadMessagesCount'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-portfolio')->with('error', 'An error occurred while retrieving user project history.');
        }
        
    }

    public function userPortfolioSave(Request $request)
    {
        $user = auth()->user();
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'file_name' => 'required|string',
                'file_type' => 'required|string',
                'file_description' => 'required|string',
                'file' => 'required|mimes:pdf,jpeg,png',
            ]);            

            if ($request->hasFile('file')) {
                $userFile = $request->file('file');
        
                $username = $user->user_name; // Get the user's username
        
                // Generate filenames                
                $userFilename = $user->user_name .'_'. uniqid(). '_' . substr(uniqid(), 0, 5) . '.' . $userFile->getClientOriginalExtension();
                
                //Store file
                $file_type = $validatedData['file_type'];                
                if($file_type=='Image'){
                    $filePath = $userFile->storeAs('portfolio/image', $userFilename, 'public');
                } 
                elseif($file_type=='Document') {
                    $filePath = $userFile->storeAs('portfolio/document', $userFilename, 'public');
                }
            }
                else {
                $filePath = null; // If no file was uploaded
            }
            
            $userPortfolio = UserPortfolio::create([
                'user_id' => $validatedData['user_id'],
                'file_name' => $validatedData['file_name'],
                'file_type' => $validatedData['file_type'],
                'file_description' => $validatedData['file_description'],
                'file_url' => $filePath,
            ]); 

            return redirect()->route('user-portfolio')->with('success', 'Project added successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during Project update. Please try again.');
        }

    }  

    public function editUserPortfolio($id)
    {
        try {  
            $userPortfolios = UserPortfolio::findOrFail($id);
    
            return view('dashboard.edit-user-portfolio', compact('userPortfolios'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-user-portfolio')->with('error', 'An error occurred while retrieving user project history.');
        }
    }  

    public function updateUserPortfolio(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([               
                'file_name' => 'required|string',
                'file_type' => 'nullable|string',
                'file_description' => 'required|string',
                'file' => 'nullable|mimes:pdf,jpeg,png',
            ]);  

            // Retrieve the user education based on the $id
            $userPortfolio = UserPortfolio::findOrFail($id);

            if ($request->hasFile('file')) {
                // Handle the new certificate file
                $userFile = $request->file('file');
                $user = auth()->user();
                $username = $user->user_name; // Get the user's username

                // Generate filenames                
                $userFilename = $user->user_name .'_'. uniqid(). '_' . substr(uniqid(), 0, 5) . '.' . $userFile->getClientOriginalExtension();
                
                //Store file
                $file_type = $validatedData['file_type'];                
                if($file_type=='Image'){
                    $filePath = $userFile->storeAs('portfolio/image', $userFilename, 'public');
                } 
                elseif($file_type=='Document') {
                    $filePath = $userFile->storeAs('portfolio/document', $userFilename, 'public');
                }
                // Update the file_url field in the database
                $userPortfolio->file_url = $filePath;
                $userPortfolio->file_type = $validatedData['file_type'];
            }

            // Update other portfolio attributes based on the request data
            $userPortfolio->update([
                'file_name' => $validatedData['file_name'],
                'file_description' => $validatedData['file_description'],                
            ]);

            // Redirect to the user's education list or another appropriate page
            return redirect()->route('user-portfolio')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-update user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle any exceptions or errors here
            return back()->with('error', 'An error occurred while updating the Project. Please try again.');
        }
    }

    public function deleteUserPortfolio($id)
    {
        try {
            $userPortfolio = UserPortfolio::findOrFail($id);
            $userPortfolio->delete();

            return redirect()->route('user-portfolio')->with('success-new', 'Project deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('user-portfolio')->with('error-new', 'Project.');
        }
    }
   
    //-----Organization Controller functions --------------------------------
    public function dashboardOrganization()
    {
        $user_id = auth()->user()->id;
        $countries = Countries::all();
        $categories = UserCategory::all();
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.org-dashboard', compact('countries','categories','messages',
        'unreadMessagesCount'));        
    }
    
    public function userRoleOrganization()
    {
        $allRoles = UserCategory::all(); // Retrieve all category from the database
        $user = auth()->user(); // Get the authenticated user
        $userRoles = explode(',', $user->user_roles); // Convert the user's saved roles to an array
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();
        return view('dashboard.user-roles-org')->with([
            'allRoles' => $allRoles,
            'userRoles' => $userRoles,
            'messages' => $messages,
            'unreadMessagesCount' => $unreadMessagesCount,
        ]);
    }

    public function userOrgRoleSave(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'user_sectors' => 'required|array|valid_sector|max_sector:3',
            ], [
                'user_sectors.valid_sector' => 'One or more selected sectors are invalid.',
            ],
                [
                    'user_sectors.max_sector' => 'You cannnot select more than 3 sector.',                
            ]);
            
            // Process the selected roles and save them in the database
            $userSectors = implode(',', $validatedData['user_sectors']);

            $user = User::findOrFail($id);
            $user->user_roles = $userSectors;
            $user->save();
        
            return redirect()->route('user-role-organization')->with('success', 'Sectors update successful.');
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return with an error message
            //$errorMessage = 'Error-save user role: ' . $e->getMessage();
            $errorMessage = 'You cannot select more than 3 sector.';
            Log::error($errorMessage);
            
            return redirect()->route('user-role-organization')->with('error', $errorMessage);
        }
    }

    public function postJob()
    {
        $user_id = auth()->user()->id;
        $categories = UserCategory::all();
        // Get all jobs posted by authenticated user----
        $records = PostJobs::where('user_id', '=', $user_id)            
            ->orderBy('created_at', 'desc')
            ->paginate(10);   
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();         
        return view('dashboard.post-job', compact('categories','records','messages','unreadMessagesCount'));        
    }

    public function postJobSave(Request $request)
    {
        //$user = auth()->user();

        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'company_name' => 'required|string|max:255',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png',
                'job_name' => 'required|string',
                'job_description' => 'required|string',
                'job_category' => 'required|string',
                'job_type' => 'required|string',
                'job_payment' => 'required|string',
                'job_location' => 'required|string',
                'job_status' => 'required|string',
                'job_link' => 'nullable|url',                
                
            ]);            

            if ($request->hasFile('company_logo')) {
                $companyLogoFile = $request->file('company_logo');
            
                $username = $validatedData['company_name'];        
            
                $companyLogoFilename = $username . '_'. uniqid(5) . '.' . $companyLogoFile->getClientOriginalExtension();
                
                // Store file
                $companyLogoPath = $companyLogoFile->storeAs('company_logo', $companyLogoFilename, 'public');
            } else {
                $companyLogoPath = 'company_logo/blank.jpg'; // If no file was uploaded
            }
              
            $PostJob = PostJobs::create([
                'user_id' => $validatedData['user_id'],
                'company_name' => $validatedData['company_name'],
                'company_logo' => $companyLogoPath,
                'job_name' => $validatedData['job_name'],
                'job_description' => $validatedData['job_description'],
                'job_category' => $validatedData['job_category'],
                'job_type' => $validatedData['job_type'],
                'job_payment' => $validatedData['job_payment'],
                'job_location' => $validatedData['job_location'],
                'job_status' => $validatedData['job_status'],
                'job_link' => $validatedData['job_link'],
                'no_of_views' => 0,
                'job_apply' => 0,
            ]); 

            //-----CHECK IF LOCATION IS AVAILABLE IN JOB LOCATION TABLE-----
            $job_location = $validatedData['job_location'];
            $existingLocation = JobLocation::where('job_location', $job_location)->first();

            if ($existingLocation) {
                // Use the existing location
                $existingLocation->increment('location_count');
                return redirect()->route('post-job')->with('success', 'Job added successfully.');
            } else {
                // Create a new location if it doesn't exist
                $jobLocation = JobLocation::create([
                    'job_location' => $validatedData['job_location'],
                    'location_count' => 1, // Set the initial count to 1 for the new location
                ]);
                return redirect()->route('post-job')->with('success', 'Job added successfully.');
            }

        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save post job: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during adding job. Please try again.');
        }

    }  

    public function editJob($id)
    {
        try {  
            $user_id = auth()->user()->id;
            $postJobs = PostJobs::findOrFail($id);
            $categories = UserCategory::all();
            
            return view('dashboard.edit-post-job', compact('postJobs','categories'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit job: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-post-job')->with('error', 'An error occurred while retrieving jobs.');
        }       
    }

    public function updateJob(Request $request , $id)
    {
        try {
            $validatedData = $request->validate([
                'company_name' => 'required|string|max:255',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png',
                'job_name' => 'required|string',
                'job_description' => 'required|string',
                'job_category' => 'required|string',
                'job_type' => 'required|string',
                'job_payment' => 'required|string',
                'job_location' => 'required|string',
                'job_status' => 'required|string',
                'job_link' => 'nullable|url',
                
            ]);            
            // Retrieve the user education based on the $id
            $postJobs = PostJobs::findOrFail($id);

            if ($request->hasFile('company_logo')) {
                $companyLogoFile = $request->file('company_logo');
            
                $username = $validatedData['company_name'];        
            
                $companyLogoFilename = $username . '_'. uniqid(5) . '.' . $companyLogoFile->getClientOriginalExtension();
                
                // Store file
                $companyLogoPath = $companyLogoFile->storeAs('company_logo', $companyLogoFilename, 'public');
            } else {
                if (empty($postJobs->company_logo)) {
                    $companyLogoPath = 'company_logo/blank.jpg'; // If no file was uploaded
                } else {
                    $companyLogoPath = $postJobs->company_logo;
                }
            }     

            $postJobs->update([                
                'company_name' => $validatedData['company_name'],
                'company_logo' => $companyLogoPath,
                'job_name' => $validatedData['job_name'],
                'job_description' => $validatedData['job_description'],
                'job_category' => $validatedData['job_category'],
                'job_type' => $validatedData['job_type'],
                'job_payment' => $validatedData['job_payment'],
                'job_location' => $validatedData['job_location'],
                'job_status' => $validatedData['job_status'],
                'job_link' => $validatedData['job_link'],
            ]); 
            //-----CHECK IF LOCATION IS AVAILABLE IN JOB LOCATION TABLE-----
            $job_location = $validatedData['job_location'];
            $existingLocation = JobLocation::where('job_location', $job_location)->first();

            if ($existingLocation) {
                // Use the existing location
                $existingLocation->increment('location_count');
                return redirect()->route('post-job')->with('success', 'Job added successfully.');
            } else {
                // Create a new location if it doesn't exist
                $jobLocation = JobLocation::create([
                    'job_location' => $validatedData['job_location'],
                    'location_count' => 1, // Set the initial count to 1 for the new location
                ]);
                return redirect()->route('post-job')->with('success', 'Job added successfully.');
            }
            
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-update job: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during updating job. Please try again.');
        }
    }

    public function deleteJob($id)
    {
        try {
            $postJobs = PostJobs::findOrFail($id);
            //-----CHECK IF LOCATION IS AVAILABLE IN JOB LOCATION TABLE-----
            $job_location = $postJobs->job_location;
            $existingLocation = JobLocation::where('job_location', $job_location)->first();
            $existingLocation->decrement('location_count');            
            $postJobs->delete();

            return redirect()->route('post-job')->with('success', 'Job deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete user portfolio: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('post-job')->with('error', 'Jobs.');
        }
    }

    public function searchJobs(Request $request)
    {
        $searchTerm = $request->input('search');

        // Assuming you have a 'PostJobs' model; update with your actual model
        $query = PostJobs::query();

        if ($searchTerm) {
            $query->where('company_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('job_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('job_category', 'like', '%' . $searchTerm . '%')
                ->orWhere('job_type', 'like', '%' . $searchTerm . '%')
                ->orWhere('job_payment', 'like', '%' . $searchTerm . '%')
                ->orWhere('job_location', 'like', '%' . $searchTerm . '%');
        }

        $records = $query->paginate(10);
    
        return view('post-job', compact('records'))->render(); 
    }
    
    public function postUpskill()
    {
        $user_id = auth()->user()->id;
        $categories = UserCategory::all();
        // Get all jobs posted by authenticated user----
        $records = PostUpskill::where('user_id', '=', $user_id)            
            ->orderBy('created_at', 'desc')
            ->paginate(10);      
        $messages = UserMessage::where('to_user_id', '=', $user_id)   
        ->where('message_status', 'Unread')
        ->orderBy('created_at', 'desc')
        ->get();

        $unreadMessagesCount = $messages->count();      
        return view('dashboard.post-upskill', compact('categories','records','messages','unreadMessagesCount'));        
    }

    public function postUpskillSave(Request $request)
    {
        //$user = auth()->user();

        try {
            $validatedData = $request->validate([
                'user_id' => 'required|integer',
                'company_name' => 'required|string|max:255',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png',
                'upskill_name' => 'required|string',
                'upskill_description' => 'required|string',
                'upskill_category' => 'required|string',
                'upskill_status' => 'required|string',
                'upskill_link' => 'nullable|url',                
                
            ]);            

            if ($request->hasFile('company_logo')) {
                $companyLogoFile = $request->file('company_logo');
            
                $username = $validatedData['company_name'];        
            
                $companyLogoFilename = $username . '_'. uniqid(5) . '.' . $companyLogoFile->getClientOriginalExtension();
                
                // Store file
                $companyLogoPath = $companyLogoFile->storeAs('company_logo', $companyLogoFilename, 'public');
            } else {
                $companyLogoPath = 'company_logo/blank.jpg'; // If no file was uploaded
            }
              
            $PostUpskill = PostUpskill::create([
                'user_id' => $validatedData['user_id'],
                'company_name' => $validatedData['company_name'],
                'company_logo' => $companyLogoPath,
                'upskill_name' => $validatedData['upskill_name'],
                'upskill_description' => $validatedData['upskill_description'],
                'upskill_category' => $validatedData['upskill_category'],
                'upskill_status' => $validatedData['upskill_status'],
                'upskill_link' => $validatedData['upskill_link'],
                'no_of_views' => 0,
                'upskill_apply' => 0,
            ]); 

            return redirect()->route('post-upskill')->with('success', 'Upskill added successfully.');

        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save post upskill: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during adding upskill. Please try again.');
        }

    }  

    public function editUpskill($id)
    {
        try {  
            $user_id = auth()->user()->id;
            $postUpskill = PostUpskill::findOrFail($id);
            $categories = UserCategory::all();
            
            return view('dashboard.edit-post-upskill', compact('postUpskill','categories'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-edit upskill: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('edit-post-upskill')->with('error', 'An error occurred while retrieving upskills.');
        }       
    }

    public function updateUpskill(Request $request , $id)
    {
        try {
            $validatedData = $request->validate([  
                'company_name' => 'required|string|max:255',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png',
                'upskill_name' => 'required|string',
                'upskill_description' => 'required|string',
                'upskill_category' => 'required|string',
                'upskill_status' => 'required|string',
                'upskill_link' => 'nullable|url',                
                
            ]);                     
            // Retrieve the user education based on the $id
            $postUpskill = PostUpskill::findOrFail($id);

            if ($request->hasFile('company_logo')) {
                $companyLogoFile = $request->file('company_logo');
            
                $username = $validatedData['company_name'];        
            
                $companyLogoFilename = $username . '_'. uniqid(5) . '.' . $companyLogoFile->getClientOriginalExtension();
                
                // Store file
                $companyLogoPath = $companyLogoFile->storeAs('company_logo', $companyLogoFilename, 'public');
            } else {
                if (empty($postUpskill->company_logo)) {
                    $companyLogoPath = 'company_logo/blank.jpg'; // If no file was uploaded
                } else {
                    $companyLogoPath = $postUpskill->company_logo;
                }
            }     

            $postUpskill->update([                
                'company_name' => $validatedData['company_name'],
                'company_logo' => $companyLogoPath,
                'upskill_name' => $validatedData['upskill_name'],
                'upskill_description' => $validatedData['upskill_description'],
                'upskill_category' => $validatedData['upskill_category'],
                'upskill_status' => $validatedData['upskill_status'],
                'upskill_link' => $validatedData['upskill_link'],
            ]); 
            return redirect()->route('post-upskill')->with('success', 'Upskill updated successfully.');
            
            
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-update upskill: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->back()->with('error', 'An error occurred during updating upskill. Please try again.');
        }
    }

    public function deleteUpskill($id)
    {
        try {
            $postUpskill = PostUpskill::findOrFail($id);
            $postUpskill->delete();

            return redirect()->route('post-upskill')->with('success', 'Upskill deleted successfully.');
        } catch (\Exception $e) {
            $errorMessage = 'Error-delete Upskill: ' . $e->getMessage();
            Log::error($errorMessage);
            return redirect()->route('post-upskill')->with('error', 'Upskill.');
        }
    }    

    // public function JobApplication()
    // {
    //     $user_id = auth()->user()->id;
    //     $categories = UserCategory::all();
    //     // Get all jobs posted by authenticated user----
    //     $records = JobApply::where('apply_type', '=', 'Job-Application')            
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);            
    //     return view('dashboard.job-application', compact('categories','records'));        
    // }

    public function userMessage()
    {
        try {
            $user_id = auth()->user()->id;               
            //---All Messages --------------------------------
            $userMessages = UserMessage::join('users', 'users.id', '=', 'from_user_id')
            ->where(function ($query) use ($user_id) {
                $query->where('to_user_id', $user_id)
                    ->orWhere('from_user_id', $user_id);
            })
            ->selectRaw('users.id as user_id, users.full_name, users.user_picture, from_user_id, COUNT(*) as message_count, user_messages.message_type, user_messages.message_status')
            ->groupBy('users.id', 'users.full_name', 'users.user_picture', 'from_user_id', 'user_messages.message_type', 'user_messages.message_status')
            ->orderBy('user_messages.created_at', 'desc')
            ->get();
            
            //---Unread Messages --------------------------------
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

             $unreadMessagesCount = $messages->count();
            // return response()->json([
            //     'unreadCount' => $unreadMessagesCount,
            //     'user_id' => $user_id
            // ]);
           return view('dashboard.user-message', compact('messages','unreadMessagesCount','userMessages'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user message: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-message')->with('error', 'An error occurred while retrieving user message.');
        }
        
    }

    public function userMessageView($id)
    {
        try {
            $user_id = auth()->user()->id;               
            //---All Messages --------------------------------
            $userMessages = UserMessage::join('users', 'users.id', '=', 'user_messages.from_user_id')
            ->where('user_messages.from_user_id', $id)
            ->where('user_messages.to_user_id', $user_id)
            ->selectRaw('users.id as user_id, users.full_name, users.user_picture, user_messages.from_user_id, COUNT(user_messages.id) as message_count, 
                user_messages.message_status, user_messages.from_user_email, user_messages.from_user_type, user_messages.from_user_picture')
            ->groupBy('users.id', 'users.full_name', 'users.user_picture', 'user_messages.from_user_id', 
                'user_messages.message_status', 'user_messages.from_user_email', 'user_messages.from_user_type', 'user_messages.from_user_picture')
            ->orderBy('user_messages.created_at', 'desc')
            ->get();

            $allUserMessages = UserMessage::join('users', 'users.id', '=', 'user_messages.from_user_id')
            ->where(function ($query) use ($id, $user_id) {
                $query->where('user_messages.from_user_id', $id)
                    ->where('user_messages.to_user_id', $user_id);
            })
            ->orWhere(function ($query) use ($id, $user_id) {
                $query->where('user_messages.to_user_id', $id)
                    ->where('user_messages.from_user_id', $user_id);
            })
            //->where('user_messages.message_status', 'Unread')
            ->selectRaw('users.id as user_id, users.full_name, users.user_picture, COUNT(user_messages.id) as message_count, 
                user_messages.message_type, user_messages.from_user_type, user_messages.message,
                user_messages.from_user_email, user_messages.created_at')
            ->groupBy('users.id', 'users.full_name', 'users.user_picture', 'user_messages.message_type', 
            'user_messages.from_user_type', 'user_messages.message', 'user_messages.from_user_email', 
            'user_messages.created_at') 
            ->orderBy('user_messages.created_at', 'desc')
            ->get();

            //---Unread Messages --------------------------------
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

             $unreadMessagesCount = $messages->count();
            
             //----Update Message as read----
             $readMessage = UserMessage::where('to_user_id', $user_id)
             ->where('from_user_id', $id)
             ->get();

            foreach ($readMessage as $message) {
                $message->message_status = 'Read';
                $message->save();
            }

           return view('dashboard.user-message-view', compact('messages','unreadMessagesCount',
           'userMessages','allUserMessages'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load user message: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('user-message')->with('error', 'An error occurred while retrieving user message.');
        }
        
    }

    public function sendMessage()
    {
        try {
            $user_id = auth()->user()->id;               
            //---All Messages --------------------------------
            $userMessages = UserMessage::where('to_user_id', $user_id)
            ->paginate(5);
            //---Unread Messages --------------------------------
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();

            $allFreelancers= User::where('user_type', '=', 'Freelancer')
            ->paginate(5);
            $allOrganizations= User::where('user_type', '=', 'Organization')
            ->paginate(5);

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.send-message', compact('messages','unreadMessagesCount','userMessages'
            ,'allFreelancers','allOrganizations'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load send message: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('send-message')->with('error', 'An error occurred while sending message.');
        }
        
    }

    public function sendMessageId($id)
    {
        try {
            $user_id = auth()->user()->id;               
            //---All Messages --------------------------------
            $userMessages = UserMessage::where('to_user_id', $user_id)
            ->paginate(5);
            //---Unread Messages --------------------------------
            $messages = UserMessage::where('to_user_id', '=', $user_id)   
            ->where('message_status', 'Unread')
            ->orderBy('created_at', 'desc')
            ->get();
            //=------------------------
            $currentUser = User::findOrFail($id);

            $allFreelancers= User::where('user_type', '=', 'Freelancer')
            ->paginate(5);
            $allOrganizations= User::where('user_type', '=', 'Organization')
            ->paginate(5);

            $unreadMessagesCount = $messages->count();
    
            return view('dashboard.send-message-id', compact('messages','unreadMessagesCount','userMessages'
            ,'allFreelancers','allOrganizations','currentUser'));
        } catch (QueryException $e) {
            $errorMessage = 'Error-load send message: ' . $e->getMessage();
            Log::error($errorMessage);
            // Handle the exception (e.g., log it or display an error message)
            return redirect()->route('send-message-id')->with('error', 'An error occurred while sending message.');
        }
        
    }

    public function sendMessageAction(Request $request)
    {
        
        try {
            $validatedData = $request->validate([
                'from_user_id' => 'required|integer',
                'to_user_id' => 'required|integer',
                'from_user_email' => 'required|string',
                'to_user_email' => 'required|string',               
                'from_user_fullname' => 'required|string',
                'to_user_fullname' => 'required|string', 
                'from_user_type' => 'required|string',
                'to_user_type' => 'required|string',   
                'from_user_picture' => 'required|string',
                'to_user_picture' => 'required|string',  
                'message' => 'required|string',
            ]);
            
            // return response()->json([
            //     'data' => $validatedData,
            // ]);
            $userMessages = UserMessage::create([
                'from_user_id' => $validatedData['from_user_id'],
                'to_user_id' => $validatedData['to_user_id'],
                'from_user_email' => $validatedData['from_user_email'],
                'to_user_email' => $validatedData['to_user_email'],
                'from_user_fullname' => $validatedData['from_user_fullname'],
                'to_user_fullname' => $validatedData['to_user_fullname'],
                'from_user_type' => $validatedData['from_user_type'],
                'to_user_type' => $validatedData['to_user_type'],
                'from_user_picture' => $validatedData['from_user_picture'],
                'to_user_picture' => $validatedData['to_user_picture'],
                'message' => $validatedData['message'],
                'message_type' => 'Direct Message',
                'message_status' => 'Unread',
                
            ]);
    
             return redirect()->route('send-message')->with('success', 'message sent successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user message: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->route('send-message')->with('error', $errorMessage);
           
            //return redirect()->back()->with('error', 'An error occurred during work experience update. Please try again.');
        }

    }

    public function replyMessageAction(Request $request)
    {
               
        try {
            $validatedData = $request->validate([
                'from_user_id' => 'required|integer',
                'to_user_id' => 'required|integer',
                'from_user_email' => 'required|string',
                'to_user_email' => 'required|string',               
                'from_user_fullname' => 'required|string',
                'to_user_fullname' => 'required|string', 
                'from_user_type' => 'required|string',
                'to_user_type' => 'required|string',   
                'from_user_picture' => 'required|string',
                'to_user_picture' => 'required|string',  
                'message' => 'required|string',
            ]);
            
        //     return response()->json([
        //        'data' => $validatedData,
        //    ]);
            $userMessages = UserMessage::create([
                'from_user_id' => $validatedData['from_user_id'],
                'to_user_id' => $validatedData['to_user_id'],
                'from_user_email' => $validatedData['from_user_email'],
                'to_user_email' => $validatedData['to_user_email'],
                'from_user_fullname' => $validatedData['from_user_fullname'],
                'to_user_fullname' => $validatedData['to_user_fullname'],
                'from_user_type' => $validatedData['from_user_type'],
                'to_user_type' => $validatedData['to_user_type'],
                'from_user_picture' => $validatedData['from_user_picture'],
                'to_user_picture' => $validatedData['to_user_picture'],
                'message' => $validatedData['message'],
                'message_type' => 'Direct Message',
                'message_status' => 'Unread',
                
            ]);
    
            return redirect()->route('user-message')->with('success', 'message sent successfully.');
        } catch (ValidationException $e) {
            // Validation failed. Redirect back with validation errors.
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Log the error
            $errorMessage = 'Error-save user message: ' . $e->getMessage();
            Log::error($errorMessage);

            return redirect()->route('user-message')->with('error', $errorMessage);
           
            //return redirect()->back()->with('error', 'An error occurred during work experience update. Please try again.');
        }

    }

    public function textArea()
    {
        return view('textarea');
    }
    
}
