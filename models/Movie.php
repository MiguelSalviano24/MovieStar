<?php

class Movie
{

    public $id;
    public $title;
    public $description;
    public $img;
    public $trailer;
    public $category;
    public $duration;
    public $users_id;
    public $rating;

    public function imageGenerateName()
    {
        return bin2hex(random_bytes(60)) . ".jpg";
    }
}

interface MovieDAOInterface
{

    public function buildMovie($data);
    public function findAll();
    public function getLatestMovies();
    public function getMoviesByCategory($category);
    public function getMoviesByUserId($id);
    public function findById($id);
    public function findByTitle($title);
    public function create(Movie $movie);
    public function update(Movie $movie);
    public function destroy($id);
}
