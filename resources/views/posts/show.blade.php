@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <p class="text-center">{{$post->descripcion}}</p>
    <img style="width: 20%" src="{{asset('uploads') . '/' . $post->imagen}}" alt="{{$post->imagen}}">

    @auth
        @if($post->user_id === auth()->user()->id)
            <form action="{{route('posts.destroy', $post)}}" method="POST">
                @method('DELETE') {{--METODO SPOOFING--}}
                @csrf
                <input type="submit" value="Eliminar publicación" class="bg-red-500 hover:text-gray-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
            </form>
        @endif
    @endauth

@endsection
