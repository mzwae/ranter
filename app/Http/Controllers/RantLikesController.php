<?php

namespace App\Http\Controllers;

use App\Rant;
use Illuminate\Http\Request;

class RantLikesController extends Controller
{
    public function store(Rant $rant)
    {
        $rant->like(current_user());

        return back();
    }
    public function destroy(Rant $rant)
    {
        $rant->dislike(current_user());

        return back();

    }
}
