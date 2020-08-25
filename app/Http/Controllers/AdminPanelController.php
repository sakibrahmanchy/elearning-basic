<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $usersCount = User::all()->count();
        $questionsCount = Question::all()->count();
        $resultCount = Result::all()->count();

        return view('adminpanel.index', [
            'usersCount'=>$usersCount,
            'questionsCount'=>$questionsCount,
            'resultCount'=>$resultCount
        ]);
    }
}
