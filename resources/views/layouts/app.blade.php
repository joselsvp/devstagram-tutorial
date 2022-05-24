<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    <nav>
        <a href="/">Principal</a>
        <a href="/nosotros">Nosotros</a>
        <a href="tienda-virtual">Tienda Virtual</a>

        <h1>@yield('titulo')</h1> {{--@yield() lo usamos como un contenedor,
                                    por lo cual le pamos la infoamción desde otra vista con @section--}}

        <hr>
        @yield('contenido')
    </nav>
</body>
</html>
