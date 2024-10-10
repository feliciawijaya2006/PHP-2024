<?php
class Book {
    public $title;
    public $author;
    public $publicationYear;

    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }
    public function getDetails () {
        return "Title: {$this->title}, Author: {$this->author}, Year: {$this->publicationYear}";
    }}
?>