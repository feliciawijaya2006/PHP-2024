<?php
require_once 'Book.php';
class EBook extends Book{
    public $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize) {
        // Call parent constructor to initialize book details
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
    }

    public function getDetails() {
        return "Judul: {$this->title}, Penulis: {$this->author}, Tahun: {$this->publicationYear}, Ukuran File: {$this->fileSize}MB";
    }
}

?>