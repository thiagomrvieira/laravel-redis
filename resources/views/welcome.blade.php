<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        {{-- Lesson 01 - Visitor count --}}
        {{-- <h1> Hello you're the visitor number #{{ $visits }}</h1> --}}

        {{-- Lesson 02 - Namespacing --}}
        {{-- <h1>Some videos</h1>

        <p>
            This video has been downloaded {{ $downloads ?? 0 }} times
        </p> --}}

        {{-- Lesson 05 - Caching --}}
        {{$articles->count()}}
    </body>
</html>
