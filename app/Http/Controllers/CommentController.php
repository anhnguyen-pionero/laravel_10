<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('content');
        $comment->user_id = auth() -> id();
        $comment->save();

        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'Idea created successfully');
    }
}
