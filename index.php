<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Perhitungan Diskon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            padding: 20px;
            margin: 20px;
        }

        .card h1 {
            text-align: center;
            color: #333;
        }

        .card label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .card input {
            width: 100%;
            padding: 4px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .result p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Perhitungan Diskon</h1>
        <form method="POST" action="">
            <label for="harga">Harga Barang (Rp):</label>
            <input type="number" id="harga" name="harga" min="1" required>

            <label for="diskon">Persentase Diskon (%):</label>
            <input type="number" id="diskon" name="diskon" min="1" max="100" required>

            <button type="submit" name="hitung">Hitung</button>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            // Untuk mengambil input dari form
            $harga = $_POST['harga'];
            $diskon = $_POST['diskon'];

            // untuk Mengecek input
            if ($harga > 0 && $diskon >= 0 && $diskon <= 100) {
                // Untuk mengitung nilai diskon dan total harga
                $nilai_diskon = $harga * ($diskon / 100);
                $total_harga = $harga - $nilai_diskon;

                // Untuk menampilkan hasil
                echo "<div class='result'>";
                echo "<h3>Hasil Perhitungan:</h3>";
                echo "<p>Harga Barang: Rp " . number_format($harga, 2, ',', '.') . "</p>";
                echo "<p>Persentase Diskon: $diskon%</p>";
                echo "<p>Nilai Diskon: Rp " . number_format($nilai_diskon, 2, ',', '.') . "</p>";
                echo "<p>Total Harga Setelah Diskon: Rp " . number_format($total_harga, 2, ',', '.') . "</p>";
                echo "</div>";
            } else {
                echo "<p style='color: red;'>Masukkan data yang valid! Diskon harus antara 0% hingga 100%, dan harga harus lebih dari 0.</p>";
            }
        }
        ?>
    </div>
</body>
</html>