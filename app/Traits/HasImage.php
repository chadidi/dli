<?php

namespace App\Traits;

use App\Models\Image;

trait HasImage
{
    public static function bootHasImage()
    {
        static::deleting(function ($entity) {
            $entity->image()->delete();
        });
    }

    /**
     * Set the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    /**
     * Attach a comment to this model as a specific user.
     *
     * @param Model|null $user
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function attachImage(string $path)
    {
        $image = new Image([
            'file_name' => $path,
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
        ]);

        if ($this->image()->count()) {
            $this->image()->delete();
        }

        return $this->image()->save($image);
    }
}
