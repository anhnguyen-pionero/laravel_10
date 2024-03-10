<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }


    public function edit(string $id)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

}
