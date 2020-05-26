<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeaFormController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'idea' => 'required|string',
        ]);

        return response()->json(null, 200);
    }
}