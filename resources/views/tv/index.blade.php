@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-tv">
        <h2 class="uperrcase tracking-wider text-yellow-600 text-lg font-semibold">Populare Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach ($popularTv as $tvshow)
        <x-tv-card :tvshow="$tvshow" />
        @endforeach
        </div>
    </div>
    {{-- Top rated --}}
    <div class="Now-playing py-24">
        <h2 class="uperrcase tracking-wider text-yellow-600 text-lg font-semibold">Top Rated Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
        @foreach ($topRatedTv as $tvshow)
        <x-tv-card :tvshow="$tvshow" />
        @endforeach

        </div>
    </div>
</div>
@stop
