<!DOCTYPE html>
<html>
<body>
    
<?php
function printPyramid($n) {
    // Memastikan input tidak lebih dari 10
    if ($n > 10) {
        $n = 10;
    }

    for ($i = 1; $i <= $n; $i++) {
        // Cetak spasi di awal
        for ($j = $n - $i; $j > 0; $j--) {
            echo "&nbsp;&nbsp;";
        }

        // Cetak bagian pertama dari palindrom (angka naik)
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }

        // Cetak bagian kedua dari palindrom (angka turun)
        for ($j = $i - 1; $j >= 1; $j--) {
            echo $j . " ";
        }

        // Pindah ke baris berikutnya
        echo "<br>";
    }
}

// Ambil input dari user
if (isset($_POST['baris'])) {
    $baris = intval($_POST['baris']);
    echo "Piramida palindrom dengan $baris baris:<br>";
    printPyramid($baris);
}
?>

<!-- Form input untuk pengguna -->
<form method="POST">
    <label for="baris">Masukkan jumlah baris: </label>
    <input type="number" id="baris" name="baris" min="1" max="10" required>
    <input type="submit" value="Cetak Piramida">
</form>


</body>
</html