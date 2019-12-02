<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourse;
use App\Http\Requests\UpdateCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => __('messages.indexed', ['model' => 'course']),
            'courses' => $courses,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourse $request)
    {
        $course = Course::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => __('messages.created', ['model' => 'course']),
            'course' => $course,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return response()->json([
            'status' => 'success',
            'message' => __('messages.retrieved', ['model' => 'course']),
            'course' => $course,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourse $request, Course $course)
    {
        $course->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => __('messages.updated', ['model' => 'course']),
            'course' => $course,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'status' => 'success',
            'message' => __('messages.deleted', ['model' => 'course']),
        ], 200);
    }
}
