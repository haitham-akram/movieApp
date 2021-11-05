<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $populerMovies;
    public $genres;
    public $nowPlayingMovies;

    public function __construct($populerMovies, $genres, $nowPlayingMovies)
    {
        $this->populerMovies = $populerMovies;
        $this->genres = $genres;
        $this->nowPlayingMovies = $nowPlayingMovies;
    }
    public function populerMovies()
    {
        return  $this->formatMovies($this->populerMovies);
    }
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
    public function nowPlayingMovies()
    {
        return  $this->formatMovies($this->nowPlayingMovies);
    }
    private function formatMovies($movies)
    {

        return collect($movies)
            ->map(function ($movie) {
                $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                    return [$value => $this->genres()->get($value)];
                })->implode(', ');
                return collect($movie)->merge([
                    'poster_path' => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
                    'vote_average' => $movie['vote_average'] * 10 . '%',
                    'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                    'genres' => $genresFormatted,
                ])->only(
                    'id',
                    'poster_path',
                    'vote_average',
                    'release_date',
                    'genres',
                    'genre_ids',
                    'title',
                    'overview',
                    'release_date',
                );
            });
    }
}
