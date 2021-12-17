<?php

namespace App\Http\Controllers;

use App\Jobs\incrementPlayerScore;
use Illuminate\Http\Request;

class pongController extends Controller
{
    //
    public function processForm(Request $request) {
//        ddd($request->all());
        dispatch( new incrementPlayerScore(intval($request->user_id)) );
        return view('pong');

    }
    public function showForm() {
        return view('pong');
    }
}
