<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{-- @if(Auth::check()) <meta name="user-id" content="{{ Auth::user()->id }}"> @endif --}}


    <title>Forqan</title>
    <!-- Font awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> --}}
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="/styleani.css" />
        <link rel="stylesheet" href="/mystyle.css" />
    {{-- <link rel="stylesheet" href="../css/tailwind.css" /> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
@vite('resources/js/app.js')
</head>

<body>
    <div id="app"></div>

</body>

</html>
