<?php
// Include the class files
require_once 'Book.php';
require_once 'EBook.php';
require_once 'PrintedBook.php';

session_start(); // Start the session

// Initialize the books array in session if not already set
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Include CSS
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";
echo "<body>";

// Function to display the form for adding books
function displayBookForm($bookType) {
    echo "<h2>Tambahkan $bookType</h2>";
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='bookType' value='$bookType'>";
    
    echo "<label>Judul Buku (max 100 karakter):</label><br>";
    echo "<input type='text' name='title' maxlength='100' required><br>";

    echo "<label>Nama Penulis (max 100 karakter):</label><br>";
    echo "<input type='text' name='author' maxlength='100' required><br>";

    echo "<label>Tahun Penerbitan (1500-2024):</label><br>";
    echo "<input type='number' name='publicationYear' min='1500' max='2024' required><br>";

    if ($bookType == "EBook") {
        echo "<label>Ukuran File (1-100 MB):</label><br>";
        echo "<input type='number' name='fileSize' min='1' max='100' required><br>";
    } else {
        echo "<label>Jumlah Halaman (1-1000):</label><br>";
        echo "<input type='number' name='numberOfPages' min='1' max='1000' required><br>";
    }

    echo "<input type='submit' name='submitBook' value='Tambah Buku'><br>";
    echo "</form>";
}

// Handle user choices
if (isset($_POST['choice'])) {
    $choice = $_POST['choice'];

    if ($choice == 1) {
        // Show form to select book type
        echo "<h2>Pilih jenis buku:</h2>";
        echo "<form action='' method='post'>";
        echo "<input type='radio' id='ebook' name='bookType' value='EBook' required>";
        echo "<label for='ebook'>EBook</label><br>";

        echo "<input type='radio' id='printedBook' name='bookType' value='PrintedBook' required>";
        echo "<label for='printedBook'>PrintedBook</label><br><br>";

        echo "<input type='submit' value='Pilih Tipe Buku'>";
        echo "</form>";
    } elseif ($choice == 2) {
        // Display details of books
        if (empty($_SESSION['books'])) {
            echo "Tidak ada buku yang tersedia.";
        } else {
            echo "<h2>Lihat Detail Buku</h2>";
            echo "<form action='' method='post'>";
            echo "<label>Masukkan indeks buku (0-" . (count($_SESSION['books']) - 1) . "):</label><br>";
            echo "<input type='number' name='index' min='0' max='" . (count($_SESSION['books']) - 1) . "' required><br>";
            echo "<input type='submit' name='viewBook' value='Lihat Buku'><br>";
            echo "</form>";
        }
    }
}

// Handle adding book details
if (isset($_POST['bookType']) && !isset($_POST['submitBook'])) {
    $bookType = $_POST['bookType'];
    displayBookForm($bookType);
}

// Save book to the array
if (isset($_POST['submitBook'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publicationYear = $_POST['publicationYear'];
    $bookType = $_POST['bookType'];

    if ($bookType == "EBook") {
        $fileSize = $_POST['fileSize'];
        $book = new EBook($title, $author, $publicationYear, $fileSize);
    } else {
        $numberOfPages = $_POST['numberOfPages'];
        $book = new PrintedBook($title, $author, $publicationYear, $numberOfPages);
    }

    $_SESSION['books'][] = $book;

    // Displaying details of all added books
    echo "<h2>Detail Buku yang Dimasukkan:</h2>";
    foreach ($_SESSION['books'] as $index => $book) {
        echo "<div class='book-details'>";
        echo $book->getDetails() . "\n";
        echo "</div>";
    }
}

// Display book details by index
if (isset($_POST['viewBook'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['books'][$index])) {
        $book = $_SESSION['books'][$index];
        echo "<div class='book-details'>";
        echo $book->getDetails();
        echo "</div>";
    } else {
        echo "Buku tidak ditemukan pada indeks tersebut.";
    }
}

echo "</body>";
echo "</html>";
?>
