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

        request()->validate(
            [
                'content' => 'required|min:5|max:240',
            ],
            [
                'idea.required' => 'Ide wajib diisi.',
                'idea.min' => 'Ide harus memiliki minimal :min huruf.',
                'idea.max' => 'Ide tidak boleh lebih dari :max huruf.',
            ]
        );

        $idea = Idea::create(
            [
                'content' => request()->get('content', ''),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
    }

    public function destroy(Idea $id)
    {

        $id->delete();

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
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        // setelah content diisi dengan value kosong karena untuk isian default nya menjadi kosong
        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', "Idea updated successfully!");
    }
}
