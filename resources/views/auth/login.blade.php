@extends('layouts.app')

@section('titulo', 'Inicia sesión en DevStagram')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="login">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="bg-gray-600 text-white my-2 rounded-lg text-sm p-3 mt-2 text-center">{{session('mensaje')}}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-1 block uppercase text-gray-500 font-bold">Correo</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese correo electrónico" class="border p-3 w-full rounded-lg
                    @error('email') border-gray-600 @enderror" value="{{old('email')}}">
                    @error('email')
                    <p class="bg-gray-600 text-white my-2 rounded-lg text-sm p-3 mt-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-1 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese contraseña" class="border p-3 w-full rounded-lg @error('password') border-gray-600 @enderror">
                    @error('password')
                    <p class="bg-gray-600 text-white my-2 rounded-lg text-sm p-3 mt-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="remember" class="text-sm text-gray-500 ">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
