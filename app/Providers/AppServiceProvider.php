<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $contacts = \App\Models\Contact::all();
            
            $profile = \App\Models\Profile::where('in_used', true)->first();
            $about = \App\Models\About::where('is_used', true)->first();
            $user = \App\Models\User::find(1);
            $coreTechStacks = \App\Models\Skill::where('is_tech_core', true)->get();
            $projects = \App\Models\Project::all();

            $allProfile = \App\Models\Profile::all();
            $allAbout = \App\Models\About::all();
            $skills = \App\Models\Skill::all();
            
            $messages = \App\Models\Message::all();
            $unviewedMessagesCount = \App\Models\Message::where('viewed', false)->get()->count();

            $view->with('coreTechStacks', $coreTechStacks);

            $view->with('unviewedMessagesCount', $unviewedMessagesCount);
            $view->with('messages', $messages);
            
            $view->with('contacts', $contacts);
            $view->with('profile', $profile);
            $view->with('allAbout', $allAbout);
            $view->with('skills', $skills);
            $view->with('projects', $projects);

            $view->with('allProfile', $allProfile);
            $view->with('user', $user);
            $view->with('about', $about);
        });    
    }
}
