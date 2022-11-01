<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forqan</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="/styleani.css" />
    <link rel="stylesheet" href="../css/tailwind.css" />
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite('resources/css/tailwind3.1.8') --}}
    @vite('resources/js/app.js')
    {{-- @vite('resources/css/app.css') --}}
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

</head>

<body>
    <div id="app"></div>
   
</body>

</html>
