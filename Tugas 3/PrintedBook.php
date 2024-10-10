<?php
require_once 'Book.php';
class PrintedBook extends Book {
    public $numberOfPages;

    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        // Call parent constructor to initialize book details
        parent::__construct($title, $author, $publicationYear);
        $this->numberOfPages = $numberOfPages;
    }

    public function getDetails() {
        return "Judul: {$this->title}, Penulis: {$this->author}, Tahun: {$this->publicationYear}, Jumlah Halaman: {$this->numberOfPages} halaman";
    }
}
?>
