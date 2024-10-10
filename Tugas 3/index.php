<!DOCTYPE html>
<html>

<head>
    <title>Book Management</title>
</head>

<body>
    <h1>Pilihan Menu</h1>
    <form action="book_handler.php" method="post">
        <label>Pilih:</label><br>
        <input type="radio" id="addBook" name="choice" value="1" required>
        <label for="addBook">Tambah Buku</label><br>

        <input type="radio" id="viewBook" name="choice" value="2" required>
        <label for="viewBook">Lihat Detail Buku</label><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>