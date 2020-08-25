<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Repositories\Eloquent\CourseRepository;

class CourseController extends Controller
{
    protected $courses;
    public function __construct(CourseRepository $courses) {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
        $this->courses = $courses;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = $this->courses->all();

        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->form(new Course());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * //     */
    public function store(StoreCourseRequest $request)
    {
        $this->courses->create($request->only(['title', 'subtitle', 'description']));
        return redirect(route('courses.index'));
    }

    public function form(Course $course)
    {
        return view('courses.form')->with(['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = $this->courses->getByIdWithRelations($id, ['lessons']);
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $course = $this->courses->getById($id);

        return $this->form($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->courses->update($course, $request->only(['title', 'subtitle', 'description']));

        return redirect(route('courses.index'));
    }
}
