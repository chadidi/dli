<?php

namespace App\Models;

use App\Traits\HasImage;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasSlug;
    use HasImage;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $with = [
        'image'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
