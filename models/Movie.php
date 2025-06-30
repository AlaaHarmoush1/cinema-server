<?php

require_once __DIR__.'/Model.php';

class Movie extends Model {
    protected static string $table = 'movies';
    protected static string $primary_key = 'id';

    private int $id;
    private string $title;
    private string $description;
    private string $poster_url;
    private string $trailer_url;
    private string $cast;
    private string $rating;
    private string $genre;
    private string $release_date;
    private string $duration_minutes;

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->poster_url = $data["poster_url"];
        $this->trailer_url = $data["trailer_url"];
        $this->cast = $data["cast"];
        $this->rating = $data["rating"];
        $this->genre = $data["genre"];
        $this->release_date = $data["release_date"];
        $this->duration_minutes = $data["duration_minutes"];
    }





    public function getId(): int {
        return $this->id;
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    
 
    public function getDescription(): string {
        return $this->description;
    }

    public function getPoster_url(): string {
        return $this->poster_url;
    }
    
 
    public function getTrailer_url(): string {
        return $this->trailer_url;
    }
    
 
    public function getCast(): string {
        return $this->cast;
    }
    
 
    public function getRating(): string {
        return $this->rating;
    }
    
 
    public function getGenre(): string {
        return $this->genre;
    }
    
 
    public function getRelease_date(): string {
        return $this->release_date;
    }
    
 
    public function getDuration_minutes(): string {
        return $this->duration_minutes;
    }
    

    
    
    public function SetTitle(string $title) {
        $this->title = $title;
    }
    
 
    public function SetDescription(string $description) {
        $this->description = $description;
    }
    
    public function SetPoster_url(string $poster_url) {
        $this->poster_url = $poster_url;
    }
    
 
    public function SetTrailer_url(string $trailer_url) {
        $this->trailer_url = $trailer_url;
    }
    
 
    public function SetCast(string $cast) {
        $this->cast = $cast;
    }
    
 
    public function SetRating(string $rating) {
        $this->rating = $rating;
    }
    
 
    public function SetGenre(string $genre) {
        $this->genre = $genre;
    }
    
 
    public function SetRelease_date(string $release_date) {
        $this->release_date = $release_date;
    }
    
 
    public function SetDuration_minutes(string $duration_minutes) {
        $this->duration_minutes = $duration_minutes;
    }

   public function toArray(): array {
    return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'poster_url' => $this->poster_url,
        'trailer_url' => $this->trailer_url,
        'cast' => $this->cast,
        'rating' => $this->rating,
        'genre' => $this->genre,
        'release_date' => $this->release_date,
        'duration_minutes' => $this->duration_minutes
    ];
}
    
 
}

?>