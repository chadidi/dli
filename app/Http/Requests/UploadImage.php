<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Course;
use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class UploadImage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => [
                'required',
                 Image::getRules(),
            ],
            'resource' => 'required|in:categories,courses',
            'resource_id' => 'required|integer',
        ];
    }
}
