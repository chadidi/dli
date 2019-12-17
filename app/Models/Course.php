<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasSlug;
    use HasImage;

    protected $with = [
        'category',
        'image',
    ];

    protected $hidden = ['category_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'slug',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
