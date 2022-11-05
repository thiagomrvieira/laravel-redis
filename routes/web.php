<?php

use App\Models\Article;
use Illuminate\Support\Facades\Cache;
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
// Route::get('/articles/trending', function () {
//     #   Returns the top 3
//     $articles = Redis::zrevrange('trending_articles', 0, 2);

//     // return Article::whereIn('id', $articles)->get();
//     $trending =  Article::hydrate(
//         array_map('json_decode', $articles)
//     );

//     dd($trending);
// });
// Route::get('/articles/{article}', function (Article $article) {
//     Redis::zincrby('trending_articles', 1, $article);

//     return $article;
// });

// ---------------------------------------------------------------

// Hashes and Caching
// Route::get('/', function () {
    
//     $user2Stats = [
//         'favorites'   => 20,
//         'watchers'    => 50, 
//         'completions' => 45
//     ];

//     Redis::hmset('user.2.stats', $user2Stats);

//     return Redis::hgetall('user.1.stats');

// });

// Route::get('/users/{id}/stats', function ($id) {
//     return Redis::hgetall("user.{$id}.stats");
// });

// Route::get('/favorite-video', function () {
//     Redis::hincrby('user.1.stats', 'favorites', 1);
//     return redirect('/');
// });

// Caching

// function remember($key, $minutes, $callback) {
//     if ($value = Redis::get($key)) {
//         return json_decode($value);
//     }

//     Redis::setex($key, $minutes, $value = $callback());

//     return $value;
// }

Route::get('/articles', function () {
   
    // return remember('articles.all', 60 * 60, function (){
    //     return Article::all();
    // });  

    return Cache::remember('articles.all', 60 * 60, function (){
        dd('epha');
        return Article::all();
    });  

});
