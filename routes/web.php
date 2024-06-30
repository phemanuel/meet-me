<?php
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomForgotPasswordController;
use App\Http\Middleware\TrackFailedLoginAttempts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.user-login')->name('login');
// });

    //------Reset Password Route
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');
    Route::post('/forgot-password', [CustomForgotPasswordController::class, 'forgotPassword'])
        ->middleware('guest')
        ->name('password.email');
    Route::get('/reset-password/{token}/{email}', function ($token,$email) {
        return view('auth.user-reset-password', ['token' => $token , 'email' => $email]);
    })->middleware('guest')->name('password.reset');
    Route::post('/reset-password', [CustomForgotPasswordController::class, 'resetPassword'])
        ->middleware('guest')
        ->name('password.update');

    Route::post('search-jobs', [PageController::class, 'searchJobs'])
        ->name('search-jobs');     

    //----Auth routes--
    Route::controller(AuthController::class)->group(function () {
        //----Login routes    
        Route::get('/', 'home')->name('home');  
        Route::get('login', 'login')->name('login');
        Route::post('login','loginAction')->name('login.action');
        //--------------

        Route::get('signup', 'signup')->name('signup');
        Route::get('signup-freelancer', 'signupFreelancer')->name('signup-freelancer'); 
        Route::get('signup-organization', 'signupOrganization')->name('signup-organization');     
        Route::post('signup-freelancer','signupAction')->name('signup.action');
        Route::post('signup-organization','signupOrgAction')->name('signup.org.action');
        //--Logout route
        Route::get('logout', 'logout')->middleware('auth')->name('logout'); 
        //----Profile route
        Route::put('profile/{id}', 'profileUpdate')->middleware('auth')
        ->name('profile-update');
        Route::put('profile-social/{id}', 'profileUpdateSocial')->middleware('auth')
        ->name('profile-update-social');
        Route::get('profile-picture', 'profilePicture')->middleware('auth')
        ->name('profile-picture');
        Route::post('profile-picture-update', 'profilePictureUpdate')->middleware('auth')
        ->name('profile-picture-update');   
        Route::get('user-message', [DashboardController::class, 'userMessage'])
        ->name('user-message');  
        Route::get('user-message-view/{id}', [DashboardController::class, 'userMessageView'])
        ->name('user-message-view');  
        Route::get('send-message', [DashboardController::class, 'sendMessage'])
        ->name('send-message');  
        Route::get('send-message/{id}', [DashboardController::class, 'sendMessageId'])
        ->name('send-message-id'); 
        Route::post('send-message', [DashboardController::class, 'sendMessageAction'])
        ->name('send-message-action'); 
        Route::post('reply-message', [DashboardController::class, 'replyMessageAction'])
        ->name('reply-message-action');
    });
    
     //----send mail route
    Route::get('send-mail', [MailController::class, 'index'])
    ->name('send-mail');    
    Route::get('subscribe-newsletter', [MailController::class, 'subscribeNewsletter'])
    ->name('subscribe-newsletter');

    //===========Verify email address routes================================
    Route::get('email-verify', [MailController::class, 'emailVerify'])
    ->name('email-verify');
    Route::get('email-verify-done/{token}', [MailController::class, 'emailVerifyDone'])
    ->name('email-verify-done');
    Route::get('resend-verification-email', [MailController::class, 'resendEmailVerification'])
    ->name('resend-verification-email');
    Route::post('resend-verification', [MailController::class, 'resendVerification'])
    ->name('resend-verification');
    Route::post('email-not-verify', [MailController::class, 'emailNotVerify'])
    ->name('email-not-verify');

    //====User dashboard routes
    Route::middleware('auth')->group(function () {
        Route::get('dashboard-freelancer', [DashboardController::class, 'index'])
        ->name('dashboard');
        Route::get('user-about', [DashboardController::class, 'index'])
        ->name('user-about');
        //----User Role Routes----------------
        Route::get('user-role', [DashboardController::class, 'userRole'])
        ->name('user-role');
        Route::put('user-role-save/{id}', [DashboardController::class, 'userRoleSave'])
        ->name('user-role-save');
        //----User Skills Routes----------------
        Route::get('user-skill', [DashboardController::class, 'userSkill'])
        ->name('user-skill');
        Route::post('user-skill-save', [DashboardController::class, 'userSkillSave'])
        ->name('user-skill-save');
        Route::get('delete-user-skill/{id}', [DashboardController::class, 'deleteUserSkill'])
        ->name('delete-user-skill');
        Route::get('edit-user-skill/{id}', [DashboardController::class, 'editUserSkill'])
        ->name('edit-user-skill');
        Route::put('update-user-skill/{id}', [DashboardController::class, 'updateUserSkill'])
        ->name('update-user-skill');
        //----User Education Routes----------------
        Route::get('user-education', [DashboardController::class, 'userEducation'])
        ->name('user-education');
        Route::post('user-education-save', [DashboardController::class, 'userEducationSave'])
        ->name('user-education-save');
        Route::get('delete-user-education/{id}', [DashboardController::class, 'deleteUserEducation'])
        ->name('delete-user-education');
        Route::get('edit-user-education/{id}', [DashboardController::class, 'editUserEducation'])
        ->name('edit-user-education');
        Route::put('update-user-education/{id}', [DashboardController::class, 'updateUserEducation'])
        ->name('update-user-education');
        //---User Experience Routes --------------------------------
        Route::get('user-experience', [DashboardController::class, 'userExperience'])
        ->name('user-experience');
        Route::post('user-experience-save', [DashboardController::class, 'userExperienceSave'])
        ->name('user-experience-save');
        Route::get('delete-user-experience/{id}', [DashboardController::class, 'deleteUserExperience'])
        ->name('delete-user-experience');
        Route::get('edit-user-experience/{id}', [DashboardController::class, 'editUserExperience'])
        ->name('edit-user-experience');
        Route::put('update-user-experience/{id}', [DashboardController::class, 'updateUserExperience'])
        ->name('update-user-experience');
        //---User Service Routes --------------------------------
        Route::get('user-service', [DashboardController::class, 'userService'])
        ->name('user-service');
        Route::post('user-service-save', [DashboardController::class, 'userServiceSave'])
        ->name('user-service-save');
        Route::get('delete-user-service/{id}', [DashboardController::class, 'deleteUserService'])
        ->name('delete-user-service');
        Route::get('edit-user-service/{id}', [DashboardController::class, 'editUserService'])
        ->name('edit-user-service');
        Route::put('update-user-service/{id}', [DashboardController::class, 'updateUserService'])
        ->name('update-user-service');
        //---
        //---User Portfolio Routes --------------------------------
        Route::get('user-portfolio', [DashboardController::class, 'userPortfolio'])
        ->name('user-portfolio');
        Route::post('user-portfolio-save', [DashboardController::class, 'userPortfolioSave'])
        ->name('user-portfolio-save');
        Route::get('delete-user-portfolio/{id}', [DashboardController::class, 'deleteUserPortfolio'])
        ->name('delete-user-portfolio');
        Route::get('edit-user-portfolio/{id}', [DashboardController::class, 'editUserPortfolio'])
        ->name('edit-user-portfolio');
        Route::put('update-user-portfolio/{id}', [DashboardController::class, 'updateUserPortfolio'])
        ->name('update-user-portfolio');
        //---
        Route::get('user-page', [PortfolioController::class, 'index'])
            ->name('user-page');   
    //---User change password --------------------------------
         Route::get('change-password', [AuthController::class, 'changePassword'])
        ->name('change-password');

    });

    // -----Organization dashboard routes---
    Route::middleware('auth')->group(function () {
        Route::get('dashboard-organization', [DashboardController::class, 'dashboardOrganization'])
        ->name('dashboard-organization');
        Route::get('user-about-organization', [DashboardController::class, 'dashboardOrganization'])
        ->name('user-about-organization');
        //----User Role Routes----------------
        Route::get('user-role-organization', [DashboardController::class, 'userRoleOrganization'])
        ->name('user-role-organization');
        Route::put('user-org-role-save/{id}', [DashboardController::class, 'userOrgRoleSave'])
        ->name('user-org-role-save'); 
        Route::get('post-job', [DashboardController::class, 'postJob'])
            ->name('post-job');               
        Route::post('post-job-save', [DashboardController::class, 'postJobSave'])
        ->name('post-job-save');
        Route::get('edit-job/{id}', [DashboardController::class, 'editJob'])
        ->name('edit-job');
        Route::put('update-job/{id}', [DashboardController::class, 'updateJob'])
        ->name('update-job');
        Route::get('delete-job/{id}', [DashboardController::class, 'deleteJob'])
        ->name('delete-job');
        

        Route::get('post-upskill', [DashboardController::class, 'postUpskill'])
            ->name('post-upskill');    
        Route::get('view-upskill', [DashboardController::class, 'viewUpskill'])
            ->name('view-upskill');    
        Route::post('post-upskill-save', [DashboardController::class, 'postUpskillSave'])
        ->name('post-upskill-save');
        Route::get('edit-upskill/{id}', [DashboardController::class, 'editUpskill'])
        ->name('edit-upskill');
        Route::put('update-upskill/{id}', [DashboardController::class, 'updateUpskill'])
        ->name('update-upskill');
        Route::get('delete-upskill/{id}', [DashboardController::class, 'deleteUpskill'])
        ->name('delete-upskill');        
        
        Route::get('payment-setup', [PageController::class, 'paymentSetup'])
            ->name('payment-setup');
        Route::get('give-review', [PageController::class, 'giveReview'])
            ->name('give-review');        

    });

    //Other pages routes --------------------------------
        
    Route::get('view-job/{id}', [PageController::class, 'viewJob'])
            ->name('view-job'); 
    Route::get('view-upskill/{id}', [PageController::class, 'viewUpskill'])
            ->name('view-upskill');
    Route::get('upskill-apply/{id}', [PageController::class, 'upskillApply'])
            ->name('upskill-apply');
    Route::get('job-apply/{id}', [PageController::class, 'jobApply'])
            ->name('job-apply');
    Route::get('job-location/{id}', [PageController::class, 'jobLocation'])
            ->name('job-location');
    Route::get('find-job', [PageController::class, 'findJob'])
            ->name('find-job'); 
    Route::get('find-upskill', [PageController::class, 'findUpskill'])
            ->name('find-upskill');  
    Route::get('find-freelancer', [PageController::class, 'findFreelancer'])
            ->name('find-freelancer');  
    Route::get('search-freelancer', [PageController::class, 'searchFreelancer'])
            ->name('search-freelancer'); 
    Route::get('job-category/{category}', [PageController::class, 'jobCategory'])
            ->name('job-category');  
    Route::get('contact-us', [PageController::class, 'contactUs'])
            ->name('contact-us');  

    Route::get('user-locked', [AuthController::class, 'userLocked'])
        ->name('user-locked'); 
    
    Route::get('/{username}', [PortfolioController::class, 'userPortfolio'])
            ->name('portfolio'); 
//------------------------------------------------------------------------------



