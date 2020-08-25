<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Models\UserOption;
use App\Repositories\Eloquent\ResultRepository;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    protected $results;
    public function __construct(ResultRepository $results) {
        $this->middleware('admin')->except(['store', 'show']);
        $this->results = $results;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $allResults = Result::orderBy('created_at', 'desc')->get();

        return view('results.index', ['allResults' => $allResults]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreResultRequest $request)
    {
        $questions = $request->input('option');
        $lessonId = $request->input('lesson_id');
        if ($questions && $lessonId) {
            try {
                $result = $this->results->saveResult($lessonId, $questions);
                return redirect(route('results.show', $result->id));
            } catch (\Exception $e) {
                dd($e);
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $result = $this->results->getByIdWithRelations($id, ['lesson', 'user', 'options']);

        return view('results.show', ['result' => $result]);

    }
}
