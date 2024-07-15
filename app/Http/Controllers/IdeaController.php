<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate([
            "idea"=> "required|min:5|max:240",
        ],
        [
            'idea.required' => 'Ide wajib diisi.',
            'idea.min' => 'Ide harus memiliki minimal :min huruf.',
            'idea.max' => 'Ide tidak boleh lebih dari :max huruf.',
        ]);

        $idea = Idea::create(
            [
            'content' => request()->get('idea',''),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
    }

    public function destroy($id){
        $idea = idea::where('id', $id)->firstOrFail();

        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
