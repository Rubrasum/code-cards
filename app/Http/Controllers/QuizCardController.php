<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizCardRequest;
use App\Http\Requests\UpdateQuizCardRequest;
use App\Models\QuizCard;

class QuizCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // get all the sharks
        $quizcards = QuizCard::all();

        // load the view and pass the sharks
//        return View::make('quizcards.index')->with('quizcards', $quizcards);
         return view('home')->with(compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizCard  $quizCard
     * @return \Illuminate\Http\Response
     */
    public function show(QuizCard $quizCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizCard  $quizCard
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizCard $quizCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizCardRequest  $request
     * @param  \App\Models\QuizCard  $quizCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizCardRequest $request, QuizCard $quizCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizCard  $quizCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizCard $quizCard)
    {
        //
    }
}
