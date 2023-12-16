<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request) {
        $paginate = Course::paginate(4);
        return view("index", ["all_courses"=>$paginate, "course" => Category::all() ,compact('paginate')]);

    }
    public function category_open($id)
    {
        $category = Category::findOrFail($id);
        $courses = Course::where('category_id', $category->id)->paginate(4);
        return view("category_open",
        compact("courses", "category")
    );
    }
}
