<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Category;
use App\Observers\CourseObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Course::observe(CourseObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
