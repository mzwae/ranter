<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'rants' => $user->rants()->withLikes()->paginate(5)
        ]);
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

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255']
        ]);

        $user->update($attributes);

        return redirect($user->path());
    }
}
