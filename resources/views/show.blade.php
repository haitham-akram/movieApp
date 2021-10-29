@extends('layouts.main')
@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{'https://image.tmdb.org/t/p/w500'.$movieDetails['poster_path']}}" alt="poster" class="rounded w-64 md:w-96" >
        </div>
        <div class="md:ml-24">
           <h2 class="text-4xl font-semibold">
            {{$movieDetails['title']}} ({{\Carbon\Carbon::parse($movieDetails['release_date'])->format('Y')}})
           </h2>
           <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-500 w-4" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <span class="ml-1">{{$movieDetails['vote_average']*10}}%</span>
            <span class="mx-2">|</span>
            <span>{{\Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y')}}</span>
            <span class="mx-2">|</span>
            <span >
                @foreach ($movieDetails['genres'] as $genre )
                {{$genre['name']}}@if (!$loop->last),@endif
               @endforeach
            </span>
            </div>
            <div class="mt-12">
                <h4 class="text-white font-semibold ">Overview</h4>
                <p class="text-gray-300 mt-4">{{$movieDetails['overview']}}</p>
            </div>
            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Cast</h4>
                <div class="flex mt-4">
                    @foreach ($movieDetails['credits']['crew'] as $crew )
                    @if ($loop->index < 2)
                    <div class="mr-8">
                        <div>{{$crew['name']}}</div>
                        <div class="text-sm text-gray-400"> {{$crew['job'] }}</div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @if ($movieDetails['videos']['results']>0)
            <div class="mt-12">
            <a href="https://youtube.com/watch?v={{$movieDetails['videos']['results'][0]['key']}}" class="flex inline-flex item-center bg-yellow-600 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-700 transition ease-in-out decoration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 fill-current" viewBox="0 0 24 24"><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <span class="ml-2">Play Trailar</span>
            </a>
        </div>
        @endif
    </div>
</div><!--end movie-info -->
<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
            {{-- card --}}
            @foreach ($movieDetails['credits']['cast'] as $cast)
            @if ($loop->index < 5)
            <div class="mt-8">
                <a href="#">
                    <img src="{{'https://image.tmdb.org/t/p/w300'.$cast['profile_path']}}" alt="actor" class="rounded hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300 hover:opacity-75 transition ease-in-out duration-150"> {{$cast['name'] }}</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span class="ml-1"> {{$cast['character']}} </span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach


        </div>
    </div>
</div> <!--end movie cast-->
<div class="movie-images border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach ($movieDetails['images']['backdrops'] as $img)
            @if ($loop->index < 9)
            {{-- card --}}
            <div class="mt-8">
                <a href="#">
                    <img src="{{'https://image.tmdb.org/t/p/w500'.$img['file_path']}}" alt="img" class="rounded hover:opacity-75 transition ease-in-out duration-150">
                </a>
            </div>
            @endif
            @endforeach
         </div>
    </div>
</div>
<!--end images-->
@stop
