@extends('layouts.main')
@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            @if ($movieDetails['poster_path'])
            <img src="{{$movieDetails['poster_path']}}" alt="poster" class="rounded w-64 md:w-96" >
                        @else
                        <img src="https://via.placeholder.com/728x1000" alt="poster" class="rounded w-64 md:w-96">
                        @endif
        </div>
        <div class="md:ml-24">
           <h2 class="text-4xl font-semibold">
            {{$movieDetails['title']}} ({{$movieDetails['release_year']}})
           </h2>
           <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-500 w-4" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <span class="ml-1">{{$movieDetails['vote_average']}}</span>
            <span class="mx-2">|</span>
            <span>{{$movieDetails['release_date']}}</span>
            <span class="mx-2">|</span>
            <span >
                {{-- @foreach ($movieDetails['genres'] as $genre )
                {{$genre['name']}}@if (!$loop->last),@endif
               @endforeach --}}
               {{$movieDetails['genres']}}
            </span>
            </div>
            <div class="mt-12">
                <h4 class="text-white font-semibold ">Overview</h4>
                <p class="text-gray-300 mt-4">{{$movieDetails['overview']}}</p>
            </div>
            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Cast</h4>
                <div class="flex mt-4">
                    @foreach ($movieDetails['crew'] as $crew )
                    <div class="mr-8">
                        <div>{{$crew['name']}}</div>
                        <div class="text-sm text-gray-400"> {{$crew['job'] }}</div>
                    </div>

                    @endforeach
                </div>
            </div>
        <div x-data="{isOpen : false}">
            @if ($movieDetails['videos']['results']>0)
            <div class="mt-12">
            <button
            @click="isOpen = true"
            class="inline-flex item-center bg-yellow-600 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-700 transition ease-in-out decoration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                <span class="ml-2">Play Trailar</span>
            </button>
        </div>
        @endif
            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show.transition.opacity="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        @if($movieDetails['videos']['results']!=null)
                        <div class="modal-body px-8 py-8">
                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movieDetails['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        @else
                        <div class="flex items-center justify-center px-4 pb-4"><p>There is no trailer for this particular movie.</p> </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </div>
</div><!--end movie-info -->
<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
            {{-- card --}}
            @foreach ($movieDetails['cast'] as $cast)
            <div class="mt-8">
                <a href="{{route('actors.show',$cast['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w300'.$cast['profile_path']}}" alt="actor" class="rounded hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="{{route('actors.show',$cast['id'])}}" class="text-lg mt-2 hover:text-gray-300 hover:opacity-75 transition ease-in-out duration-150"> {{$cast['name'] }}</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span class="ml-1"> {{$cast['character']}} </span>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div> <!--end movie cast-->
<div x-data="{isOpen : false, image: ''}">
<div class="movie-images border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @foreach ($movieDetails['images'] as $img)

            {{-- card --}}
            <div class="mt-8">
                <a
                @click.prevent="
                isOpen = true
                image = '{{'https://image.tmdb.org/t/p/original'.$img['file_path']}}'
                "
                 href="#"
                 >
                    <img src="{{'https://image.tmdb.org/t/p/w500'.$img['file_path']}}" alt="img" class="rounded hover:opacity-75 transition ease-in-out duration-150">
                </a>
            </div>
            @endforeach
         </div>
         <div
         style="background-color: rgba(0, 0, 0, .5);"
         class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
         x-show.transition.opacity="isOpen">
         <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
             <div class="bg-gray-900 rounded">
                 <div class="flex justify-end pr-4 pt-2">
                     <button
                         @click="isOpen = false"
                         @keydown.escape.window="isOpen = false"
                         class="text-3xl leading-none hover:text-gray-300">&times;
                     </button>
                 </div>
                 <div class="modal-body px-8 py-8">
                     <img :src="image" alt="poster">
                 </div>
             </div>
         </div>
     </div>
    </div>
</div>
</div>
<!--end images-->
@stop
