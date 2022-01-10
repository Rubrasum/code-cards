<?php

namespace App\Http\Controllers;

use App\Jobs\QuizCard\Store as QuizCardStore;
use App\Http\Requests\StoreQuizCardRequest;
use App\Http\Requests\UpdateQuizCardRequest;
use App\Http\Resources\QuizCardCollection;
use App\Http\Resources\QuizCardResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\QuizCard;

class QuizCardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $quizcards = QuizCard::all();
        return new QuizCardCollection($quizcards);
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
        // Validate Form Data.
        // Need to make sure this returns failure. Might do it automatically.
        $data = $request->validate([
            'deck' => 'required|max:80',
            'parent' => 'required|max:80',
            'type' => 'required|max:80',
            'data_string_1' => 'required|max:510',
            'data_string_2' => 'required|max:510',
        ]);
        // Create the quizcard object.
        $quizcard = QuizCard::create($data);
        // Dispatch the Store QuizCard Job.
        QuizCardStore::dispatch($quizcard)->onQueue('store');
        // Send the id back so that the frontend knows which channel to listen to.
        return $quizcard->id;
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
