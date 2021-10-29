@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uperrcase tracking-wider text-yellow-600 text-lg font-semibold">Populare Moives</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
        @foreach ($populerMovies as $Movie)
           <x-movie-card :movie="$Movie" :genres="$genres" />
        @endforeach
        </div>
    </div>
    {{-- Now playing --}}
    <div class="Now-playing py-24">
        <h2 class="uperrcase tracking-wider text-yellow-600 text-lg font-semibold">Now playing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
            @foreach ($nowPlayingMovies as $Movie)
            <x-movie-card :movie="$Movie" :genres="$genres" />
        @endforeach

        </div>
    </div>
</div>
@stop
