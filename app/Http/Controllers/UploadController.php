<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImage;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(UploadImage $request)
    {
        $path = $request->image->store('images', 'public');

        return response()->json([
            'status' => 'success',
            'message' => __('messages.image_uploaded'),
            'url' => asset('storage/' . $path),
        ], 200);
    }
}
