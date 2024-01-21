<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate([
            "content"=> "required|min:5|max:240",
        ]);

        Idea::create(['content' => request()->get('content', '')]);

        return redirect()->route('home')->with( 'success','Idea created successfully');
    }

    public function destroy(Idea $idea){
        $idea->delete();

        return redirect()->route('home')->with( 'success','Idea deleted successfully');
    }

    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
    }
}
