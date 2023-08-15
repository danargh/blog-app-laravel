<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    private static $blog_posts = [
        [
            "title" => "Judul post pertama",
            "author" => "Danargh",
            "slug" => "judul-post-pertama",
            "body" => "Elit cupidatat nostrud fugiat velit nisi commodo officia deserunt cupidatat labore nostrud in quis voluptate. Nisi dolor incididunt fugiat do. Cupidatat voluptate nisi veniam tempor magna Lorem do ea ut duis amet. Aliqua id ad pariatur adipisicing ut quis excepteur consectetur aliqua sit irure."
        ],
        [
            "title" => "Judul post kedua",
            "author" => "Danargh",
            "slug" => "judul-post-kedua",
            "body" => "Elit cupidatat nostrud fugiat velit nisi commodo officia deserunt cupidatat labore nostrud in quis voluptate. Nisi dolor incididunt fugiat do. Cupidatat voluptate nisi veniam tempor magna Lorem do ea ut duis amet. Aliqua id ad pariatur adipisicing ut quis excepteur consectetur aliqua sit irure."
        ]
    ];

    public static function getAllPost()
    {
        return collect(self::$blog_posts);
    }

    public static function findPost($slug)
    {
        // static untuk method static sedangkan self untuk property static
        $posts = static::getAllPost();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
