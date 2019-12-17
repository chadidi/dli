<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Category;
use App\Observers\CourseObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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

        Relation::morphMap([
            'courses' => Course::class,
            'categories' => Category::class,
        ]);
    }
}
