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
            <li><a href="index.php">Beranda</a></li>
            <li><a href="index.php#about">Tentang</a></li>
            <li><a href="index.php#services">LookWork</a></li>
            <li><a href="comp.php">Profile Perusahaan</a></li>
            <li><a href="index.php#contact">Kontak</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    </header>
    <main class="container mt-5">
    <div class="grid-container">
    <?php
include 'koneksi.php';

// Query dengan JOIN ke tabel perusahaan untuk mengambil nama, deskripsi, dan email perusahaan
$sql = "SELECT jobs.*, companies.company_name, companies.company_description, companies.contact_email, companies.company_id 
        FROM jobs 
        LEFT JOIN companies ON jobs.company_id = companies.company_id";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mengisi variabel dengan validasi jika data ada
        $company_id = isset($row['company_id']) ? $row['company_id'] : 0;
        $comp = isset($row['company_name']) ? $row['company_name'] : 'Tidak ada perusahaan';  // Nama perusahaan
        $comp_desc = isset($row['company_description']) ? $row['company_description'] : 'Tidak ada deskripsi perusahaan';  // Deskripsi perusahaan
        $deskripsi = isset($row['job_description']) ? $row['job_description'] : 'Tidak ada deskripsi';
        $lokasi = isset($row['location']) ? $row['location'] : 'Tidak ada lokasi';

        // Menampilkan data pekerjaan
        echo "<div class='grid-item'>";
        echo "<h5>" . $comp . "</h5>";  // Menampilkan nama perusahaan
        echo "<p><strong>Deskripsi Perusahaan:</strong> " . $comp_desc . "</p>";  // Menampilkan deskripsi perusahaan
        echo "<p><strong>Lokasi:</strong> " . $lokasi . "</p>";  // Menampilkan lokasi pekerjaan
        
        // Link ke halaman detail perusahaan, meneruskan company_id
        echo "<a href='compdetail.php?company_id=" . $company_id . "' class='btn-apply'>Profil Perusahaan</a>";
        echo "</div>";
    }
} else {
    echo "<p>No records found</p>";
}

$db->close();
?>

    </div>
    </main>

    <footer>
        <p>&copy; 2024 LookWork. All Rights Reserved.</p>
    </footer>
</body>
</html>