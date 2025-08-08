<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::active()
            ->latest()
            ->paginate(12);
            
        $featuredCourses = Course::active()
            ->featured()
            ->limit(3)
            ->get();

        return view('courses.index', compact('courses', 'featuredCourses'));
    }

    public function show(Course $course)
    {
        if (!$course->is_active) {
            abort(404);
        }

        return view('courses.show', compact('course'));
    }

    public function register(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Check if user already registered for this course
        $existingRegistration = CourseRegistration::where('course_id', $course->id)
            ->where('email', $request->email)
            ->first();

        if ($existingRegistration) {
            return response()->json([
                'success' => false,
                'message' => 'You have already registered for this course!'
            ], 422);
        }

        CourseRegistration::create([
            'course_id' => $course->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! We will contact you soon.'
        ]);
    }
}
