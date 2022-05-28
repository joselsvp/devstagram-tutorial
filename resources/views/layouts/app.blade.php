<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>

    <title>Laravel</title>
</head>
<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>

            @if(auth()->user())
                <p>Autenticado</p>
            @else
                <p>No autenticado</p>
            @endif
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 mr-2" href="{{route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600" href="{{route('register')}}">Crear Cuenta</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos reservados {{date('Y')}}
    </footer>
</body>
</html>
