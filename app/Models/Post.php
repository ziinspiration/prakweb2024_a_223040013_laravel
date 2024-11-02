<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'post-laravel-detail',
                'title' => 'Laravel',
                'author' => 'Ilham Ramadhana Hartono',
                'body' => 'Laravel adalah sebuah framework untuk mengembangkan aplikasi web. Dengan menggunakan framework ini, kamu bisa mempercepat waktu pengembangan aplikasi, mempermudah pengelolaan sumber daya dengan performa terbaik, dan mendapatkan aplikasi yang lebih aman dengan OWASP security principles.'

            ],
            [
                'id' => 2,
                'slug' => 'post-php-detail',
                'title' => 'PHP',
                'author' => 'Ilham Ramadhana Hartono',
                'body' => 'PHP adalah singkatan dari Hypertext Preprocessor, yaitu bahasa pemrograman open source yang digunakan untuk pengembangan web. PHP merupakan bahasa pemrograman script yang dijalankan di sisi server.
                           PHP pertama kali dikembangkan oleh Rasmus Lerdorf pada tahun 1994. Saat ini, pengelolaan PHP berada di bawah naungan The PHP Group. PHP memiliki beberapa kelebihan, di antaranya: Mudah dipelajari, Memiliki kemampuan yang cukup kuat, Tergolong open source dan dapat digunakan secara gratis.'
            ]
        ];
    }

    public static function find($slug): array
    {
        // Dengan Callback
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] === $slug;
        // });

        // Dengan Arrow Function
        // $ Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
        if (! $post) {
            abort(404);
        }

        return $post;
    }
}
