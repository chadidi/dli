<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => __('messages.indexed', ['model' => 'categorie']),
            'categories' => $categories,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug ?? Str::slug($request->name);

        if (!$category->save()) {
            return response()->json([
                'status' => 'success',
                'message' => __('messages.failed'),
            ], 429);
        }

        return response()->json([
            'status' => 'success',
            'message' => __('messages.created', ['model' => 'category']),
            'category' => $category,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'status' => 'success',
            'message' => __('messages.retrieved', ['model' => 'category']),
            'category' => $category,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->name = $request->name;

        if ($request->slug) {
            $category->slug = $request->slug;
        }

        if (!$category->save()) {
            return response()->json([
                'status' => 'success',
                'message' => __('messages.failed'),
            ], 429);
        }

        return response()->json([
            'status' => 'success',
            'message' => __('messages.updated', ['model' => 'category']),
            'category' => $category,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
