<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Pluck digunakan untuk mendapatkan kolom yang diinginkan
        $followingIDs = auth()->user()->followings()->pluck('user_id');
        
        // latest digunakan sama seperti orderBy('created_at', 'DESC')
        // whereIn digunakan untuk mencari kolom dari sebuah array
        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
