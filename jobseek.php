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
$sql = "SELECT * FROM lowongan";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        // Mengisi variabel untuk digunakan dalam mailto
        $nama_comp = $row['nama_comp'];
        $kebutuhan = $row['kebutuhan'];
        $deskripsi = $row['deskripsi'];
        $deskripsi = $row['deskripsi'];


        echo "<div class='grid-item'>";
        echo "<h5>" . $nama_comp . "</h5>";
        echo "<p>" . $kebutuhan . "</p>";
        echo "<p>" . $deskripsi . "</p>";

        // Membuat mailto link dinamis
        $mailto_link = "mailto:example@gmail.com?subject=Job%20Application%20for%20" . urlencode($nama_comp) .
            "&body=Dear%20" . urlencode($nama_comp) . "%2C%0A%0AI%20am%20interested%20in%20applying%20for%20the%20position%20of%20" .
            urlencode($kebutuhan) . ".%0A%0A" . "%0A%0AThank%20you.";
        
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