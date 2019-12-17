<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Http\Requests\UploadImage;

class UploadController extends Controller
{
    public function __invoke(UploadImage $request)
    {
        $model = $this->findResource($request->resource, $request->resource_id);
        if (!$model) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Resource not found!',
            ], 404);
        }

        $path = $request->image->store('images', 'public');
        $image = $model->attachImage($path);

        return response()->json([
            'status' => 'success',
            'message' => __('messages.image_uploaded'),
            'image' => $image,
        ], 200);
    }

    public function findResource($resource, $resourceId)
    {
        switch ($resource) {
            case 'courses':
                return Course::find($resourceId);
            case 'categories':
                return Category::find($resourceId);
            default:
                return null;
        }
    }
}
