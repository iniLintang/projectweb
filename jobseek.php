<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LookWork</title>
    <link rel="stylesheet" href="aset/css/index.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">LookWork</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php/#about">About</a></li>
            <li><a href="#services">LookWork</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#contact">Login</a></li>
        </ul>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    
    </header>
    <main class="container mt-5">
    <div class="grid-container">
    <?php
include 'koneksi.php';
$sql = "SELECT * FROM jobs";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mengisi variabel untuk digunakan dalam mailto
        $judul = $row['judul'];  // Judul pekerjaan
        $deskripsi = $row['deskripsi'];  // Deskripsi pekerjaan
        $lokasi = $row['lokasi'];  // Lokasi pekerjaan
        $gaji = number_format($row['gaji'], 2);  // Gaji (format desimal)
        $persyaratan = $row['persyaratan'];  // Persyaratan pekerjaan
        $employer_email = "employer@example.com";  // Email perusahaan, ini bisa diambil dari employer_id jika terkait di tabel lain

        echo "<div class='grid-item'>";
        echo "<h5>" . $judul . "</h5>";  // Menampilkan judul pekerjaan
        echo "<p><strong>Lokasi:</strong> " . $lokasi . "</p>";  // Menampilkan lokasi pekerjaan
        echo "<p><strong>Gaji:</strong> $" . $gaji . "</p>";  // Menampilkan gaji pekerjaan
        echo "<p><strong>Deskripsi:</strong> " . $deskripsi . "</p>";  // Menampilkan deskripsi pekerjaan
        echo "<p><strong>Persyaratan:</strong> " . $persyaratan . "</p>";  // Menampilkan persyaratan pekerjaan

        // Membuat mailto link dinamis untuk apply job
        $mailto_link = "mailto:" . $employer_email . "?subject=Job%20Application%20for%20" . urlencode($judul) .
            "&body=Dear%20Employer%2C%0A%0AI%20am%20interested%20in%20applying%20for%20the%20position%20of%20" .
            urlencode($judul) . " located in " . urlencode($lokasi) . ".%0A%0AThank%20you.";

        // Menampilkan tombol Apply yang membuka mailto
        echo "<a href='" . $mailto_link . "' class='btn-apply'>Apply for Job</a>";
        echo "</div>";
    }
} else {
    echo "<p>No records found</p>";
}

$db->close();
?>

    </div>
</main>
</body>
<footer>
        <p>&copy; 2024 LookWork. All Rights Reserved.</p>
    </footer>
</html>