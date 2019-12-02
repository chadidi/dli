<?php

namespace App\Observers;

use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Course $course)
    {
        $course->setSlug();
    }
}
