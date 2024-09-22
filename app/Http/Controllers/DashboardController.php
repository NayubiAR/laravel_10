<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Buat ngecheck email yang dibuat
        // return new RegisterEmail(auth()->user());


        /* ---- Konsep Laravel Eloquent Eager Loading ---- */
        // Disini digunakan with dengan memanggil model yang memiliki relationship nya agar mendapatkan semua item yang terkait pada satu kali reload
        // Bisa memanggil single string atau array pada with

        // == == == Contoh == == ==
        // ada query dengan relationship yang ingin memanggil salah satu id nya yang bernilai "2" didalam 1 page.
        // ada juga query yang sama dan di dalam 1 page yang sama namun memanggil nilai id yang berbeda yaitu "3".
        // nah query tersebut akan dijadikan 1 !!
        // Cara nya adalah nilai dari id 2 dan 3 akan dimasukkan kedalam array di satu query.
        // Berikut contoh query nya
        // select * from `*nama database` where `*nama database` . `*nama field` in (2, 3)

        // Selain itu ada juga kasus dimana didalam model relationship terdapat relationship lagi
        // Contoh nya pada model comment yang dimana didalam nya terdapat relationship dengan user
        // Jadi kita harus memanggil relationship nya juga menjadi 'comments.user' "." disini dapat diartikan menjadi dan

        // $ideas = Idea::with('user', 'comments.user')->orderBy('created_at', 'DESC');

        // Kita juga dapat menggunakan eager loading pada model namun perlu menggunakan
        // without agar query tersebut tidak terpanggil di controller yang menggunakan model tersebut
        // $ideas = Idea::without('user', 'comments.user')->orderBy('created_at', 'DESC');

        $ideas = Idea::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}