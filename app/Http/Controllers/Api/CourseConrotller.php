<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use App\Models\User;

class CourseConrotller extends Controller
{
    public function courseEnrollment(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'total_videos' => 'required'
        ]);


        $course = new Course();
        $course->user_id = auth()->user()->id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->total_videos = $request->total_videos;

        $course->save();

        return response()->json([
            'status' => 1,
            'massage' => ' Course Enrolment Successfully'
        ]);


    }

    public function totalCourses()
    {
        $id = auth()->user()->id;
        $courses = User::find($id)->courses;


        return response()->json([
            'status' => 1,
            'massage' => 'Total Course Enrollment For User',
            'data' => $courses

        ]);


    }


    public function deleteCourse($id)
    {
        $user_id = auth()->user()->id;
        if (Course::where([
            'id' => $id,
            'user_id' => $user_id
        ])->exists()) {

            $course =Course::find($id);

            $course->delete();

            return response()->json([
                'status' => 1,
                'massage' => 'Course deleted successfully',

            ], 200);
        } else {

            return response()->json([
                'status' => 0,
                'massage' => 'Course Not Found',

            ], 404);

        }


    }
}
