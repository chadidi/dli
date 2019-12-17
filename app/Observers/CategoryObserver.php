<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Category $category)
    {
        $category->setSlug();
    }
}
