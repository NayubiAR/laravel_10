<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        // Dengan menggunakan compact dapat mempersingkat code 'idea' => $idea yang mana bertujuan untuk mencari variable yang sama dari compact
        // Dan akan membuatkan array asosiatif
        return view('ideas.show', compact('idea'));
    }

    public function store()
    {

        $requested = request()->validate(
            [
                'content' => 'required|min:5|max:240',
            ],
            [
                'idea.required' => 'Ide wajib diisi.',
                'idea.min' => 'Ide harus memiliki minimal :min huruf.',
                'idea.max' => 'Ide tidak boleh lebih dari :max huruf.',
            ]
        );

        Idea::create($requested);

        return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
    }

    public function destroy(Idea $idea)
    {

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function edit(Idea $idea)
    {
        // Dengan menggunakan compact dapat mempersingkat code 'idea' => $idea yang mana bertujuan untuk mencari variable yang sama dari compact
        // Dan akan membuatkan array asosiatif
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $requested = request()->validate(
            [
                'content' => 'required|min:5|max:240',
            ],
            [
                'idea.required' => 'Ide wajib diisi.',
                'idea.min' => 'Ide harus memiliki minimal :min huruf.',
                'idea.max' => 'Ide tidak boleh lebih dari :max huruf.',
            ]
        );

        $idea->update($requested);

        return redirect()->route('ideas.show', $idea->id)->with('success', "Idea updated successfully!");
    }
}
