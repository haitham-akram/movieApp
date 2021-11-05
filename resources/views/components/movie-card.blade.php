<div class="mt-8">

    <a href="{{route('movies.show',$Movie['id'])}}">
        <img src="{{$Movie['poster_path']}}" alt="poster" class="rounded-t hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show',$Movie['id'])}}" class="text-lg mt-2 hover:text-gray-300 hover:opacity-75 transition ease-in-out duration-150">{{$Movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-500 w-4" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            <span class="ml-1">{{$Movie['vote_average']}}</span>
            <span class="mx-2">|</span>
            <span>{{$Movie['release_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$Movie['genres']}}
        </div>
    </div>
</div>
