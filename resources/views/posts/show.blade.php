@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <p class="text-center">{{$post->descripcion}}</p>
    <img style="width: 20%" src="{{asset('uploads') . '/' . $post->imagen}}" alt="{{$post->imagen}}">
@endsection
