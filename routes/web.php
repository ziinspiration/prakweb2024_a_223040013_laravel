<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Ilham Ramadhana Hartono', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
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
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
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

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
