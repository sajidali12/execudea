<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = CourseRegistration::with('course')->latest();

        // Filter by course if specified
        if ($request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        // Search by name or email
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        $registrations = $query->paginate(15);
        $courses = Course::orderBy('title')->get();

        return view('admin.course-registrations.index', compact('registrations', 'courses'));
    }

    public function destroy(CourseRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.course-registrations.index')
            ->with('success', 'Registration deleted successfully!');
    }
}
