<?php

namespace App\Models;

use Config;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'file_name',
        'imageable_id',
        'imageable_type',
    ];

    protected $appends = [
        'url',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public static function getRules()
    {
        $rules = Config::get('imageable.rules');
        if (Config::get('imageable.restrictMimes')) {
            $mimes = Config::get('imageable.mimes');
            if (!empty($rules[ 'file' ])) {
                $rules[ 'file' ] .= '|';
            }
            $rules[ 'file' ] .= 'mimes:'. implode(',', $mimes);
        }
        return $rules;
    }

    public function getUrlAttribute()
    {
        return asset('storage/'. $this->file_name);
    }
}
