<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status', '3')->latest('id')->paginate(10);

        return $courses;
    }

    public function store(Request $request){
        $category = $request->category;
        $level = $request->level;
        $courses = Course::whereHas('category', function($query) use ($category){
            $query->where('slug', $category);
        })
        ->where('status', 3)
        ->when($level, function($query, $level){
            $query->whereHas('level', function($query) use ($level){
                $query->where('slug', $level);
            });
        })
        ->latest('id')
        ->paginate(10);

        return $courses;
    }
}
