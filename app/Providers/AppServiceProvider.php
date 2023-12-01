<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\UserRoles;
use App\Models\UserCategory;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Validator::extend('max_words', function ($attribute, $value, $parameters, $validator) {
            $maxWords = $parameters[0];
            $wordCount = str_word_count($value);

            return $wordCount <= $maxWords;
        });

        Validator::extend('valid_roles', function ($attribute, $value, $parameters, $validator) {
            // Retrieve valid role names from the database
            $validRoles = UserRoles::pluck('user_roles')->all(); // Assuming 'name' is the field in the Role model
    
            // Check if each selected role name exists in the list of valid roles
            foreach ($value as $role) {
                if (!in_array($role, $validRoles)) {
                    return false;
                }
            }
    
            return true;
        });

        Validator::extend('max_roles', function ($attribute, $value, $parameters, $validator) {
            $maxRoles = $parameters[0];
            return count($value) <= $maxRoles;
        });

        //----Industry sector-----------------
        Validator::extend('valid_sector', function ($attribute, $value, $parameters, $validator) {
            // Retrieve valid category names from the database
            $validSectors = UserCategory::pluck('category')->all(); // Assuming 'name' is the field in the Role model
    
            // Check if each selected role name exists in the list of valid roles
            foreach ($value as $sector) {
                if (!in_array($sector, $validSectors)) {
                    return false;
                }
            }
    
            return true;
        });

        Validator::extend('max_sector', function ($attribute, $value, $parameters, $validator) {
            $maxSector = $parameters[0];
            return count($value) <= $maxSector;
        });
    }
}
