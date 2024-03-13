<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class FollowController extends Controller
{
    public function follow(User $user):RedirectResponse
    {
        auth()->user()->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Followed user');
    }

    public function unfollow(User $user):RedirectResponse
    {
        auth()->user()->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Unfollowed user');
    }
}
