<?php // Tag pembuka skrip PHP utama
require_once "Gitar.php"; // Mengimpor blueprint class Gitar WAJIB SEBELUM session_start agar PHP mengenali strukturnya
session_start(); // Memulai sesi untuk menyimpan data objek secara persisten sementara tanpa database

// Definisi kolom tabel secara dinamis: label => nama method getter
// Karena disusun sebagai array, jumlah/urutan kolom bisa diubah tanpa mengubah logika tabel.
$kolom = [ // Membuat array asosiatif untuk memetakan header tabel dengan nama fungsi getternya
    "Nama"         => "getNama", // Kolom Nama mengambil dari getNama()
    "Merek"        => "getMerek", // Kolom Merek mengambil dari getMerek()
    "Tahun"        => "getTahunProduksi", // Kolom Tahun mengambil dari getTahunProduksi()
    "Jml Senar"    => "getJumlahSenar", // Kolom Jml Senar mengambil dari getJumlahSenar()
    "Bahan Senar"  => "getBahanSenar", // Kolom Bahan Senar mengambil dari getBahanSenar()
    "Jenis Badan"  => "getJenisBadan", // Kolom Jenis Badan mengambil dari getJenisBadan()
    "Tipe Gitar"   => "getTipeGitar", // Kolom Tipe Gitar mengambil dari getTipeGitar()
    "Jml Fret"     => "getJumlahFret", // Kolom Jml Fret mengambil dari getJumlahFret()
    "Jenis Pickup" => "getJenisPickup", // Kolom Jenis Pickup mengambil dari getJenisPickup()
]; // Penutup array kolom

// 5 object awal (wajib ada sebelum ada input user), disimpan di session
// supaya data yang ditambahkan tetap ada selama sesi berlangsung.
if (!isset($_SESSION['daftarGitar'])) { 
    $_SESSION['daftarGitar'] = [ 
        // Menggunakan path lokal "images/nama_file.jpg"
        new Gitar("Fender Jimi Hendrix Stratocaster", "Fender", 2024, 6, "Nickel", "Solid Body", "Electric", 21, "SSS", "images/fender.jpg"), 
        new Gitar("Gibson Les Paul Custom '68", "Gibson", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker", "images/lespaul.jpg"), 
        new Gitar("Gibson J-45", "Gibson", 2024, 6, "Steel", "Dreadnought", "Acoustic", 20, "None", "images/j45.jpg"), 
        new Gitar("Yamaha CG122MS", "Yamaha", 2023, 6, "Nylon", "Classical", "Classical", 19, "None", "images/yamaha_cg.jpg"), 
        new Gitar("Yamaha Pacifica 611VFM", "Yamaha", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker + P90", "images/pacifica.jpg"), 
    ]; 
}

$pesan = ""; // Inisialisasi variabel kosong untuk menampung pesan notifikasi sukses/error

// Menambahkan data gitar baru dari form (method POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) { // Memeriksa apakah ada request metode POST yang di-submit melalui tombol 'tambah'
    $nama        = trim($_POST['nama'] ?? ''); // Menangkap input nama dan membersihkan spasi berlebih
    $merek       = trim($_POST['merek'] ?? ''); // Menangkap input merek dan membersihkan spasi berlebih
    $tahun       = (int) ($_POST['tahunProduksi'] ?? 0); // Menangkap dan memaksa (casting) input tahun menjadi integer
    $jmlSenar    = (int) ($_POST['jumlahSenar'] ?? 0); // Menangkap dan memaksa input jumlah senar menjadi integer
    $bahanSenar  = trim($_POST['bahanSenar'] ?? ''); // Menangkap input bahan senar
    $jenisBadan  = trim($_POST['jenisBadan'] ?? ''); // Menangkap input jenis badan
    $tipeGitar   = trim($_POST['tipeGitar'] ?? ''); // Menangkap input tipe gitar
    $jmlFret     = (int) ($_POST['jumlahFret'] ?? 0); // Menangkap dan memaksa input jumlah fret menjadi integer
    $jenisPickup = trim($_POST['jenisPickup'] ?? ''); // Menangkap input jenis pickup

    // Handle Upload Gambar
    $fotoProdukPath = "https://via.placeholder.com/60/CCCCCC/000000?text=No+Img"; // Menetapkan path gambar default jika user tidak mengunggah file
    if (isset($_FILES['fotoProduk']) && $_FILES['fotoProduk']['error'] === UPLOAD_ERR_OK) { // Cek apakah ada file yang diunggah dan tidak ada error
        $uploadDir = 'uploads/'; // Menentukan nama folder tempat file akan disimpan
        if (!is_dir($uploadDir)) { mkdir($uploadDir, 0777, true); } // Membuat folder uploads secara otomatis jika belum ada
        $fileName = time() . '_' . basename($_FILES['fotoProduk']['name']); // Menambahkan stempel waktu (time) di depan nama file agar unik
        $targetFilePath = $uploadDir . $fileName; // Menggabungkan folder path dengan nama file
        
        if (move_uploaded_file($_FILES['fotoProduk']['tmp_name'], $targetFilePath)) { // Memindahkan file dari folder sementara (tmp) ke direktori tujuan
            $fotoProdukPath = $targetFilePath; // Jika sukses, timpa path gambar default dengan path lokal gambar baru
        } // Penutup blok sukses upload
    } // Penutup blok pengecekan file upload

    if ($nama === '' || $merek === '' || $tahun <= 1900 || $jmlSenar <= 0 || $jmlFret <= 0) { // Validasi jika ada isian yang kosong atau angka rasional salah
        $pesan = "❌ Data tidak valid. Pastikan semua field terisi dengan benar."; // Set string pesan error
    } else { // Jika seluruh input divalidasi dengan aman
        $_SESSION['daftarGitar'][] = new Gitar($nama, $merek, $tahun, $jmlSenar, $bahanSenar, $jenisBadan, $tipeGitar, $jmlFret, $jenisPickup, $fotoProdukPath); // Instansiasi objek baru beserta path foto, lalu dorong ke array session
        $pesan = "Gitar berhasil ditambahkan!"; // Set string pesan keberhasilan
    } // Penutup blok validasi form
} // Penutup penanganan method POST form

// Reset data kembali ke 5 object awal
if (isset($_GET['reset'])) { // Cek apakah ada parameter 'reset' di URL (metode GET)
    unset($_SESSION['daftarGitar']); // Menghapus memori array gitar dari sesi
    header("Location: main.php"); // Mengarahkan ulang halaman ke dirinya sendiri agar bersih (refresh)
    exit; // Hentikan eksekusi script selanjutnya
} // Penutup blok fitur reset

$daftarGitar = $_SESSION['daftarGitar']; // Salin referensi array dari session ke variabel lokal agar mudah dipanggil di HTML
?> <!-- Tag penutup logika PHP, beralih ke rendering tampilan HTML -->
<!DOCTYPE html> <!-- Deklarasi tipe dokumen HTML5 -->
<html lang="id"> <!-- Tag pembuka HTML dengan set bahasa Indonesia -->
<head> <!-- Bagian metadata dokumen -->
    <meta charset="UTF-8"> <!-- Penyesuaian encoding karakter ke UTF-8 -->
    <title>Sistem Data Instrumen Gitar</title> <!-- Judul halaman yang muncul di tab browser -->
    <style> /* Tag pembuka CSS untuk gaya tampilan */
        body { font-family: Arial, sans-serif; margin: 30px; background: #f7f8fa; color: #222; } /* Styling dasar body: font, margin, warna background dan teks */
        h1 { margin-bottom: 4px; } /* Jarak bawah judul utama */
        .subtitle { color: #666; margin-top: 0; margin-bottom: 24px; } /* Warna dan jarak untuk sub judul */
        .card { background: #fff; border-radius: 10px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); } /* Styling kotak putih (card) dengan bayangan halus */
        table { border-collapse: collapse; width: 100%; } /* Aturan agar border tabel menyatu dan selebar penuh */
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #e5e5e5; white-space: nowrap; vertical-align: middle; } /* Padding sel, border bawah, mencegah text wrap, dan mengatur vertikal alignment ke tengah untuk gambar */
        th { background: #f0f2f5; font-size: 13px; text-transform: uppercase; color: #555; } /* Styling baris header tabel: warna abu muda dan teks kapital */
        tr:hover { background: #fafbfc; } /* Efek warna abu transparan saat baris disorot kursor (hover) */
        .table-wrap { overflow-x: auto; } /* Fitur geser horizontal (scroll) untuk layar sempit */
        form label { display: block; font-weight: bold; margin-top: 12px; margin-bottom: 4px; font-size: 14px; } /* Menjadikan label blok berdiri sendiri dan berhuruf tebal */
        form input, form select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 6px; } /* Menyeragamkan ukuran dan padding form input */
        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; } /* Tata letak kolom form (2 kolom sejajar) */
        button { margin-top: 20px; width: 100%; background: #4f6ef2; color: #fff; border: none; padding: 12px; border-radius: 8px; font-size: 15px; cursor: pointer; } /* Styling tombol utama biru */
        button:hover { background: #3d5adf; } /* Warna biru lebih gelap saat kursor mengarah ke tombol */
        .pesan { padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; background: #e8f8ee; color: #1a7a3d; } /* Gaya notifikasi pesan hijau */
        .reset { display: inline-block; margin-top: 10px; font-size: 13px; color: #888; text-decoration: none; } /* Gaya teks link reset abu-abu */
        .img-preview { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; } /* CSS khusus untuk memastikan kotak gambar foto rapi dan tidak gepeng */
    </style> <!-- Tag penutup CSS -->
</head> <!-- Penutup head -->
<body> <!-- Bagian isi yang terlihat di browser -->

    <h1>🎸 Daftar Gitar</h1> <!-- Judul H1 halaman -->

    <?php if ($pesan): ?> <!-- Cek menggunakan PHP: Apakah ada isi di variabel pesan? -->
        <div class="pesan"><?= htmlspecialchars($pesan) ?></div> <!-- Jika ada pesan, tampilkan dalam div dengan proteksi special chars -->
    <?php endif; ?> <!-- Tutup pengecekan if -->

    <div class="card"> <!-- Kontainer tabel berlatar putih -->
        <h2>Daftar Gitar (<?= count($daftarGitar) ?> data)</h2> <!-- Header judul list beserta kalkulasi dinamis total data -->
        <div class="table-wrap"> <!-- Pembungkus agar tabel responsive -->
            <table> <!-- Tag awal pembuatan tabel -->
                <thead> <!-- Bagian judul / header kolom tabel -->
                    <tr> <!-- Baris tabel header -->
                        <th>Foto</th> <!-- Kolom gambar diposisikan paling kiri sesuai instruksi -->
                        <th>No</th> <!-- Kolom nomor urut -->
                        <?php foreach ($kolom as $label => $getter): ?> <!-- Looping menggunakan PHP ke array $kolom -->
                            <th><?= htmlspecialchars($label) ?></th> <!-- Mencetak key dari array $kolom sebagai teks header -->
                        <?php endforeach; ?> <!-- Selesai looping kolom -->
                    </tr> <!-- Tutup baris tabel header -->
                </thead> <!-- Tutup bagian kepala tabel -->
                <tbody> <!-- Bagian tubuh / isi data tabel -->
                    <?php foreach ($daftarGitar as $i => $g): ?> <!-- Looping seluruh array objek gitar. $i indeks, $g adalah objek per item -->
                        <tr> <!-- Membuat baris baru untuk tiap instrumen gitar -->
                            <td><img src="<?= htmlspecialchars($g->getFotoProduk()) ?>" alt="Foto" class="img-preview"></td> <!-- Menampilkan tag image (gambar produk) yang memanggil URL foto melalui getter khusus, paling kiri sebelum No -->
                            <td><?= $i + 1 ?></td> <!-- Menampilkan urutan angka otomatis (indeks + 1 karena array mulai dari 0) -->
                            <?php foreach ($kolom as $label => $getter): ?> <!-- Looping lagi menelusuri array $kolom untuk mapping getter ke data cell -->
                                <td><?= htmlspecialchars($g->$getter()) ?></td> <!-- Mencetak isi sel dengan cara mengeksekusi metode getter $g sesuai loop -->
                            <?php endforeach; ?> <!-- Tutup looping kolom sel -->
                        </tr> <!-- Tutup baris instrumen -->
                    <?php endforeach; ?> <!-- Selesai semua perulangan baris tabel -->
                </tbody> <!-- Tutup tubuh tabel -->
            </table> <!-- Selesai blok tabel HTML -->
        </div> <!-- Tutup pembungkus responsive -->
        <a class="reset" href="main.php?reset=1" onclick="return confirm('Reset ke 5 data awal?');">Reset ke data awal</a> <!-- Tautan link dengan konfirmasi JS untuk mengaktifkan fitur hapus session -->
    </div> <!-- Tutup kontainer putih tabel -->

    <div class="card"> <!-- Kontainer putih kedua untuk form -->
        <h2>Tambah Data Gitar Baru</h2> <!-- Header formulir penambahan data -->
        <!-- Form ditambahkan atribut enctype="multipart/form-data" yang WAJIB ada agar web bisa meng-upload file foto fisik -->
        <form method="post" action="main.php" enctype="multipart/form-data"> <!-- Mulai formulir dengan target POST ke halaman ini sendiri -->
            <div class="grid2"> <!-- Susunan grid 2 kolom css -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Nama Gitar</label> <!-- Teks label input -->
                    <input type="text" name="nama" required> <!-- Input box untuk nama yang wajib diisi (required) -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Merek</label> <!-- Teks label input -->
                    <input type="text" name="merek" required> <!-- Input box untuk merek (required) -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Tahun Produksi</label> <!-- Teks label input -->
                    <input type="number" name="tahunProduksi" min="1901" required> <!-- Input box angka dengan batasan tahun 1901 -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Jumlah Senar</label> <!-- Teks label input -->
                    <input type="number" name="jumlahSenar" min="1" required> <!-- Input box angka senar minimal 1 -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Bahan Senar</label> <!-- Teks label input -->
                    <input type="text" name="bahanSenar" placeholder="Nickel / Steel / Nylon ..." required> <!-- Input box teks bahan senar -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Jenis Badan</label> <!-- Teks label input -->
                    <input type="text" name="jenisBadan" placeholder="Solid Body / Dreadnought ..." required> <!-- Input box teks jenis badan gitar -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Tipe Gitar</label> <!-- Teks label input -->
                    <input type="text" name="tipeGitar" placeholder="Electric / Acoustic / Classical ..." required> <!-- Input box teks spesifikasi kelas gitar -->
                </div> <!-- Tutup div -->
                <div> <!-- Pembungkus elemen input grid -->
                    <label>Jumlah Fret</label> <!-- Teks label input -->
                    <input type="number" name="jumlahFret" min="1" required> <!-- Input box angka jangkauan fret gitar -->
                </div> <!-- Tutup div -->
            </div> <!-- Selesai grid 2 kolom -->
            <label>Jenis Pickup</label> <!-- Label untuk komponen pickup -->
            <input type="text" name="jenisPickup" placeholder="Humbucker / SSS / None ..."> <!-- Input untuk sensor getaran elektrik -->
            
            <label>Foto Produk (Opsional)</label> <!-- Label khusus untuk field unggahan gambar foto -->
            <input type="file" name="fotoProduk" accept="image/*"> <!-- Input spesifik khusus berkas tipe file gambar / foto / png / jpg -->

            <button type="submit" name="tambah" value="1">+ Tambah Gitar</button> <!-- Tombol biru pemantik POST eksekusi simpan -->
        </form> <!-- Menutup wilayah form data entry -->
    </div> <!-- Menutup ruang kontainer putih kedua -->

</body> <!-- Batas akhir elemen visual web -->
</html> <!-- Penutup dokumen dasar HTML -->