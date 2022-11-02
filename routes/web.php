<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

// Lesson 01 - Visitor count
// Route::get('/', function () {
//     $visits =  Redis::incr('visits');
//     return view('welcome', ['visits' => $visits]);
//     return view('welcome')->withVisits($visits);
// });

// Lesson 02 - Namespacing
Route::get('/videos/{id}', function ($id) {
    $downloads =  Redis::get("videos.{$id}.downloads");

    return view('welcome')->withDownloads($downloads);
});

Route::get('/videos/{id}/download', function ($id) {
    $downloads =  Redis::incrBy("videos.{$id}.downloads", 1);

    return back();
});