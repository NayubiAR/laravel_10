<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        // User yang sudah login
        $liker = auth()->user();
        // Menambahkan many to many relationship
        // Memanggil relationship nya yaitu likes dari model Idea
        // lalu gunakan attach(attach hanya bisa dipakai ketika many to many relationship)
        // fyi attach sendiri dipakai untuk membuat data pivot/penghubung
        // Contoh nya ketika admin memberikan like pada user mangka id_admin dan id_user akan di tambahkan ke database pivot ini
        $liker->likes()->attach($idea);

        return redirect()->route('dashboard')->with('success', "Liked!");
    }

    public function unlike(Idea $idea)
    {
        // User yang sudah login
        $liker = auth()->user();
        // Menambahkan many to many relationship
        // Memanggil relationship nya yaitu likes dari model Idea
        // lalu gunakan detach(detach hanya bisa dipakai ketika many to many relationship)
        // fyi detach sendiri dipakai untuk menghapus data pivot/penghubung
        // Contoh nya ketika admin menghapus like pada user mangka id_admin dan id_user akan di hapuskan dari database pivot ini
        $liker->likes()->detach($idea);

        return redirect()->route('dashboard')->with('success', "UnLiked!");
    }
}