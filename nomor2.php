<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Array</title>
</head>
<body>
    <h1>Sort Array</h1>
    <form method="POST">
        <label for="nums1">Input angka untuk nums1 (misal: [1, 2, 3]):</label><br>
        <input type="text" id="nums1" name="nums1" required><br><br>
        
        <label for="m">Jumlah elemen yang ingin disort dari nums1:</label><br>
        <input type="number" id="m" name="m" min="1" required><br><br> <!-- Menambahkan atribut min -->

        <label for="nums2">Input angka untuk nums2 (misal: [4, 5, 6]):</label><br>
        <input type="text" id="nums2" name="nums2" required><br><br>
        
        <label for="n">Jumlah elemen yang ingin disort dari nums2:</label><br>
        <input type="number" id="n" name="n" min="1" required><br><br> <!-- Menambahkan atribut min -->

        <input type="submit" value="Sort">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil input dari form
        $nums1_input = $_POST['nums1'];
        $m = (int)$_POST['m'];
        $nums2_input = $_POST['nums2'];
        $n = (int)$_POST['n'];

        // Mengonversi input string menjadi array
        $nums1 = json_decode($nums1_input);
        $nums2 = json_decode($nums2_input);

        // Memastikan bahwa input adalah array dan tidak ada elemen negatif
        if (!is_array($nums1) || !is_array($nums2)) {
            echo "Input harus berupa array yang valid.<br>";
            exit;
        }

        if (min($nums1) < 0 || min($nums2) < 0) {
            echo "Elemen array tidak boleh negatif.<br>";
            exit;
        }

        // Memastikan bahwa jumlah elemen yang ingin disort tidak melebihi ukuran array
        if ($m > count($nums1)) {
            echo "Jumlah elemen yang ingin disort dari nums1 melebihi ukuran array.<br>";
            $m = count($nums1);
        }
        if ($n > count($nums2)) {
            echo "Jumlah elemen yang ingin disort dari nums2 melebihi ukuran array.<br>";
            $n = count($nums2);
        }

        // Mengambil elemen yang ingin disort dari masing-masing array
        $sub_nums1 = array_slice($nums1, 0, $m);
        $sub_nums2 = array_slice($nums2, 0, $n);

        // Menggabungkan kedua array
        $array_gabung = array_merge($sub_nums1, $sub_nums2);

        // Melakukan sorting pada array kedua array yang telah digabung
        sort($array_gabung);

        // Menampilkan hasil
        echo "Array yang telah disort: ";
        echo implode(", ", $array_gabung);
    }
    ?>
</body>
</html>

