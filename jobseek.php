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

// Query dengan JOIN ke tabel perusahaan (jika perlu)
$sql = "SELECT jobs.*, companies.company_name FROM jobs 
        LEFT JOIN companies ON jobs.company_id = companies.company_id";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mengisi variabel dengan validasi jika data ada
        $judul = isset($row['job_title']) ? $row['job_title'] : 'Tidak ada judul';
        $comp = isset($row['company_name']) ? $row['company_name'] : 'Tidak ada perusahaan';  // Nama perusahaan
        $deskripsi = isset($row['job_description']) ? $row['job_description'] : 'Tidak ada deskripsi';
        $lokasi = isset($row['location']) ? $row['location'] : 'Tidak ada lokasi';

        // Hapus simbol non-numerik dari gaji dan ubah format ke Rupiah
        $gaji_raw = isset($row['salary_range']) ? $row['salary_range'] : '0-0';  // Rentang gaji, misalnya: 8000000-12000000
        $gaji_parts = explode('-', $gaji_raw);  // Pisahkan gaji minimal dan maksimal

        // Memastikan ada minimal dan maksimal gaji, jika tidak ada, set default 0
        $gaji_min = isset($gaji_parts[0]) ? floatval(preg_replace("/[^0-9]/", "", $gaji_parts[0])) : 0;
        $gaji_max = isset($gaji_parts[1]) ? floatval(preg_replace("/[^0-9]/", "", $gaji_parts[1])) : 0;

        // Format gaji menjadi Rupiah
        $gaji_min_formatted = "Rp " . number_format($gaji_min, 0, ',', '.');
        $gaji_max_formatted = "Rp " . number_format($gaji_max, 0, ',', '.');

        // Gabungkan gaji minimum dan maksimum dalam satu string
        $gaji = $gaji_min_formatted . '-' . $gaji_max_formatted;

        $persyaratan = isset($row['job_type']) ? $row['job_type'] : 'Tidak ada memiliki tipe';
        $employer_email = isset($row['contact_email'])? $row['contact_email']: 'Tidak ada email';  // Anda bisa mengganti ini sesuai kebutuhan

        // Menampilkan data pekerjaan
        echo "<div class='grid-item'>";
        echo "<h5>" . $judul . "</h5>";  // Menampilkan judul pekerjaan
        echo "<p><strong>Perusahaan:</strong> " . $comp . "</p>";  // Menampilkan nama perusahaan
        echo "<p><strong>Lokasi:</strong> " . $lokasi . "</p>";  // Menampilkan lokasi pekerjaan
        echo "<p><strong>Gaji:</strong> " . $gaji . "</p>";  // Menampilkan gaji dengan format Rupiah
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