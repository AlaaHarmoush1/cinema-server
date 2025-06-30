<?php

require_once __DIR__.'/Model.php';

class Movie extends Model {
    protected static string $table = 'movies';
    protected static string $primary_key = 'id';

    private int $id;
    private string $title;
    private string $description;
    private string $trailer_url;
    private string $cast;
    private string $rating
    private string $genre;
    private string $release_date;
    private string $duration_minutes;

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
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
    

    
    
    public function SetTitle(): string {
        $this->title = $title;
    }
    
 
    public function SetDescription(): string {
        $this->description = $description;
    }
    
 
    public function SetTrailer_url(): string {
        $this->trailer_url = $trailer_url;
    }
    
 
    public function SetCast(): string {
        $this->cast = $cast;
    }
    
 
    public function SetRating(): string {
        $this->rating = $rating;
    }
    
 
    public function SetGenre(): string {
        $this->genre = $genre
    }
    
 
    public function SetRelease_date(): string {
        $this->release_date = $release_date;
    }
    
 
    public function SetDuration_minutes(): string {
        $this->duration_minutes = $duration_minutes;
    }

    public function toArray(){
        return [
            $this->id,
            $this->title,
            $this->description,
            $this->trailer_url,
            $this->cast,
            $this->rating,
            $this->release_date,
            $this->duration_minutes,
        ]
    }
    
    
 
}

?>