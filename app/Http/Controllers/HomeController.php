<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CourseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $courses;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseRepository $courses)
    {
        $this->middleware('auth');
        $this->courses = $courses;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = $this->courses->all();
        return view('home', ['courses' => $courses]);
    }
}
