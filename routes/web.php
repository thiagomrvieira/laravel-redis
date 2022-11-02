<?php

use App\Models\Article;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

// Lesson 01 - Visitor count
// Route::get('/', function () {
//     $visits =  Redis::incr('visits');
//     return view('welcome', ['visits' => $visits]);
//     return view('welcome')->withVisits($visits);
// });

// ---------------------------------------------------------------

// Lesson 02 - Namespacing
// Route::get('/videos/{id}', function ($id) {
//     $downloads =  Redis::get("videos.{$id}.downloads");

//     return view('welcome')->withDownloads($downloads);
// });

// Route::get('/videos/{id}/download', function ($id) {
//     $downloads =  Redis::incrBy("videos.{$id}.downloads", 1);

//     return back();
// });

// ---------------------------------------------------------------

// Trending Articles with Sorted Sets
Route::get('/articles/trending', function () {
    #   Returns the top 3
    $articles = Redis::zrevrange('trending_articles', 0, 2);

    // return Article::whereIn('id', $articles)->get();
    $trending =  Article::hydrate(
        array_map('json_decode', $articles)
    );

    dd($trending);
});
Route::get('/articles/{article}', function (Article $article) {
    Redis::zincrby('trending_articles', 1, $article);

    return $article;
});

