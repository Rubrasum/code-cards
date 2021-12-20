<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizCardRequest;
use App\Http\Requests\UpdateQuizCardRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\QuizCard;

class QuizCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        // get all the sharks
        $quizcards = QuizCard::all();

        // load the view and pass the sharks
        // return View::make('quizcards.index')->with('quizcards', $quizcards);
        return view('quizcard')->with(compact('quizcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $quizcard = QuizCard::create($data);

        return Response::json($quizcard);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(QuizCard $quizCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(QuizCard $quizCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateQuizCardRequest $request, QuizCard $quizCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(QuizCard $quizCard)
    {
        //
    }
}
