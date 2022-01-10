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
use Illuminate\Support\Facades\Log;

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
        // Need to make sure this returns failure. It might happen automatically
        $data = $request->validate([
            'user_id' => 'required',
            'deck' => 'required|max:80',
            'parent' => 'required|max:80',
            'type' => 'required|max:80',
            'data_string_1' => 'required|max:510',
            'data_string_2' => 'required|max:510',
        ]);
        // Create quizcard object
        $quizcard = new QuizCard($data);

        Logger('ApiController QuizCard Store Method Called');

        // Dispatch job to save Quizcard, and return result to notify front-end.
        QuizCardStore::dispatch($quizcard);
        return "Quiz Card Store Job Dispatched.";
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
