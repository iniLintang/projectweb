<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LookWork</title>
    <link rel="stylesheet" href="aset/css/index.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo" >LookWork</div>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#services">LookWork</a></li>
            <li><a href="comp.php">Profile Perusahaan</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <div class="slider">    
        <div class="slide">
            <img src="gambar/LOOKWORK.jpg" alt="Banner 1" class="banner-image">
        </div>
        <div class="slide">
            <img src="gambar/BANNER1.png" alt="Banner 1" class="banner-image">
        </div>
        <!-- Tambahkan lebih banyak slide jika perlu -->
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>

    <section id="about" class="about-section">
        <h2>Tentang</h2>
        <p>LookWork adalah platform terpercaya yang mempermudah Anda menemukan pekerjaan impian atau 
            membuka peluang karir bagi orang lain. Dengan kemudahan navigasi dan fitur unggulan, 
            LookWork menghubungkan pencari kerja dengan perusahaan yang tepat, memastikan proses rekrutmen yang efisien dan tepat sasaran. 
            Tingkatkan kesempatan Anda untuk sukses dengan LookWork, tempat di mana karir dimulai dan talenta terbaik ditemukan.</p>
    </section>

        <section id="services" class="services-section">
        <main class="container mt-5">
    <div class="grid-container">
    <?php
include 'koneksi.php';

// Query dengan LIMIT 3 untuk menampilkan maksimal 3 lowongan saja
$sql = "SELECT jobs.*, companies.company_name FROM jobs 
        LEFT JOIN companies ON jobs.company_id = companies.company_id
        LIMIT 3";  // Batasi hasil yang diambil hanya 3

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
        $employer_email = "employer@example.com";  // Anda bisa mengganti ini sesuai kebutuhan

        // Menampilkan data pekerjaan
        echo "<div class='grid-item'>";
        echo "<h5>" . $judul . "</h5>";  // Menampilkan judul pekerjaan
        echo "<p><strong>Perusahaan:</strong> " . $comp . "</p>";  // Menampilkan nama perusahaan
        echo "<p><strong>Lokasi:</strong> " . $lokasi . "</p>";  // Menampilkan lokasi pekerjaan
        echo "<p><strong>Gaji:</strong> " . $gaji . "</p>";  // Menampilkan gaji dengan format Rupiah
        echo "<p><strong>Deskripsi:</strong> " . $deskripsi . "</p>";  // Menampilkan deskripsi pekerjaan
        echo "<p><strong>Persyaratan:</strong> " . $persyaratan . "</p>";  // Menampilkan persyaratan pekerjaan

        // Membuat mailto link dinamis untuk apply job
        echo "</div>";
    }
} else {
    echo "<p>No records found</p>";
}

$db->close();
?>



    </div>
</main>
        <button class="seek-job" onclick="window.location.href='jobseek.php'">look for job</button>
    </section>



    <section id="contact" class="contact-section">
        <h2>Kontak Kami</h2>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Kirim Pesan</button>
        </form>
    </section>

    

    <footer>
        <p>&copy; 2024 LookWork. All Rights Reserved.</p>
    </footer>

    <script src="aset/js/index.js"></script>
</body>
</html>
