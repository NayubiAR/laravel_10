<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    // ":" Digunakan agar ketika menggunakan query nya yang dipanggil hanya field tertentu saja
    // Contoh query tanpa menggunakan ":"
    // select * from `*nama database` where `*nama database` . `*nama field` in (2, 3)
    // Setelah menggunakan
    // select `id`, `name`, `image` from `users` where `users`.`id` in (2, 3)
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "like"
    ];
    // protected $fillable = [
    //     'content',
    //     'like'
    // ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika nama user
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like');
    }
}