<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\idea;

class IdeaController extends Controller
{
    //
    public function all() {
        return idea::all();
    }

    public function add(Request $request) {
        $idea = new idea;
        $idea->$text = $request->$text;
        $idea->save();
        return $idea;
    }
}
