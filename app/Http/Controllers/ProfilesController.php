<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // if ($user->isNot(current_user())) {
        //     abort(404);
        // }

        $this->authorize('edit', $user);

        // Log::warning($user);

        return view('profiles.edit', compact('user'));
    }
}
