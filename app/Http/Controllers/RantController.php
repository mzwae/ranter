<?php

namespace App\Http\Controllers;

use App\Rant;
use Illuminate\Http\Request;

class RantController extends Controller
{

    public function index()
    {
        return view('rants.index', [
            'rants' => auth()->user()->timeline()
        ]);
    }


    public function store()
    {
        // Validate request
        $attributes = request()->validate(['body' => 'required|max:255']);

        // Persist data to database
        Rant::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/rants');
    }


    public function edit(Rant $rant)
    {
        $attributes = request()->validate(['body' => 'required|max:255']);

           // Update data in the database
          $rant->update([
            'body' => $attributes['body']
        ]);

        return back();
    }

    public function delete(Rant $rant)
    {
        Rant::destroy($rant->id);

        return back();
    }
}
