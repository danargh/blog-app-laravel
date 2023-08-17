<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    // * untuk memperbolehkan pengisian data dengan Post::create()
    // protected $fillable = ["title", "excerpt", "body"];
    protected $guarded = ["id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
