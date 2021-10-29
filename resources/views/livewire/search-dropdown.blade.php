{{-- Because she competes with no one, no one can compete with her. --}}
    <div class="relative mt-3 md:mt-0">
        <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline text-sm" placeholder="Search">
        <div class="absolute top-0">
        <svg xmlns="http://www.w3.org/2000/svg" class=" fill-current w-4 text-gray-500 mt-2 ml-2"  viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"/></svg>
        </div>
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
        @if (strlen($search)>0)
        <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
            @if ($searchResults->count()>=2)
            <ul>
                @foreach ($searchResults as $searchResult)
                <li class="border-b border-gray-700">
                    <a href="{{ route('movies.show', $searchResult['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center hover:opacity-75 transition ease-in-out duration-150">
                        @if ($searchResult['poster_path'])
                        <img src="{{'https://image.tmdb.org/t/p/w92'.$searchResult['poster_path']}}" alt="poster" class="rounded w-9" >
                        @else
                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-9">
                        @endif
                        <span class="ml-4">{{$searchResult['title']}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <div class="px-3 py-3">
                No results for "{{$search}}"
            </div>
            @endif
        </div>
        @endif
    </div>
