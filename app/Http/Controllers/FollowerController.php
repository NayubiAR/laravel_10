<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    // Disini memakai user yang akan difollow
    public function follow(User $user)
    {
        // Follower adalah user yang sedang login
        $follower = auth()->user();
        // Mengambil relationship nya pada user controller
        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', "Follow successfully!");
    }

    public function unfollow(User $user)
    {
        // Follower adalah user yang sedang login
        $follower = auth()->user();
        // Mengambil relationship nya pada user controller
        // Detach digunakan untuk menghapus relationsthip nya jika ada
        $follower->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success', "UnFollow successfully!");
    }
}