<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RantController extends Controller
{
    public function store()
    {
        // Validate request
        $attributes = request()->validate(['body' => 'required|max:255']);
        
        // Persist data to database
        Rant::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);  
        
        return redirect('/home');
    }
}
