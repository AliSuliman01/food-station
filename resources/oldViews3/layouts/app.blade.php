<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    <script src="https://kit.fontawesome.com/55102645b5.js" crossorigin="anonymous"></script>

    <style>
        html {
            max-height: 100vm;
            min-height: 100vh;
        }
    </style>
    @livewireStyles

</head>
{{--dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}"--}}
<body class="w-full h-full {{ $background }} px-[7rem] ">
<livewire:navbar/>

<main>
    {{ $slot }}
</main>
@vite('resources/js/app.js')
@livewireScripts

<script type="module" src="{{asset('js/index.js')}}"></script>
</body>
</html>
