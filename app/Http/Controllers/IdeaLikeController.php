<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Request $request, Idea $idea)
    {
        $idea->likes()->attach(auth()->user()->id);
        return redirect()->route('home')->with('success', 'Idea liked successfully');
    }

    public function unlike(Request $request, Idea $idea)
    {
        $idea->likes()->detach(auth()->user()->id);
        return redirect()->route('home')->with('success', 'Idea unliked successfully');
    }
}
