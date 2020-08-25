<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelessonRequest;
//use App\Http\Requests\UpdateLessonRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\lesson;
use App\Models\Topic;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $lessons;
    protected $courses;
    public function __construct(LessonRepository $lessons, CourseRepository $courses) {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
        $this->lessons = $lessons;
        $this->courses = $courses;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $lessons = $this->lessons->all();

        return view('lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $courses = $this->courses->get()->toArray();
        return $this->form(new Lesson(), $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(StoreLessonRequest $request)
    {

        $lesson = $this->lessons->create($request->only(['title','description', 'course_id']));
        return $lesson->toJson();
    }

    public function form(Lesson $lesson, array $courses)
    {
        return view('lessons.form')->with(['lesson' => $lesson, 'courses' => $courses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $lesson = $this->lessons->getByIdWithRelations($id, ['questions']);

        return view('lessons.show', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = $this->lessons->getById($id);

        return $this->form($lesson);
    }

    public function addQuestions(StoreQuestionRequest $request)
    {
        $lessonId = $request->get('lesson_id');
        $questions = $request->get('questions');
        $this->lessons->addQuestionsToLesson($lessonId, $questions);
    }
}
