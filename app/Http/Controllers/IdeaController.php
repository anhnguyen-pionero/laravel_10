<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\RedirectResponse;

class IdeaController extends Controller
{
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Idea created successfully');
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Idea deleted successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {

        $this->authorize('update', $idea);

        if (auth()->id() !== $idea->user_id) {
            abort('404');
        }

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea): RedirectResponse
    {
        $this->authorize('update', $idea);


        $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);


        $idea->update($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Idea updated successfully');
    }
}
