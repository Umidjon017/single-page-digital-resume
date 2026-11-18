<!doctype html>
@php /** @var \App\DataObjects\Resume $resume */ @endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $resume->basics->name }} Resume</title>
    @vite(['resources/js/app.js'])
</head>
    <body class="text-gray-800 bg-gray-100">
        Hello {{ $resume->basics->name }} ({{ $resume->basics->label }})
    </body>
</html>
