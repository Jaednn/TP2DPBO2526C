<?php // Tag pembuka file PHP
require_once "InstrumenSenar.php"; // Mengimpor file parent class InstrumenSenar

// class Gitar merupakan turunan dari InstrumenSenar
// Instrumen -> InstrumenSenar -> Gitar (Multilevel Inheritance)
class Gitar extends InstrumenSenar { // Deklarasi class Gitar sebagai turunan kedua (Multilevel)
    private $tipeGitar; // Deklarasi atribut tipe gitar (Private)
    private $jumlahFret; // Deklarasi atribut jumlah fret (Private)
    private $jenisPickup; // Deklarasi atribut jenis pickup (Private)
    private $foto_produk; // Atribut tambahan untuk menyimpan path/URL gambar foto produk

    public function __construct($nama, $merek, $tahunProduksi, $jumlahSenar, $bahanSenar, $jenisBadan, // Parameter hingga level 2
                                 $tipeGitar, $jumlahFret, $jenisPickup, $foto_produk = "https://via.placeholder.com/60") { // Parameter level 3 beserta foto_produk dengan default gambar
        // meneruskan atribut Instrumen + InstrumenSenar ke parent
        parent::__construct($nama, $merek, $tahunProduksi, $jumlahSenar, $bahanSenar, $jenisBadan); // Memanggil constructor class parent (InstrumenSenar)

        $this->tipeGitar = $tipeGitar; // Inisialisasi atribut tipe gitar
        $this->jumlahFret = $jumlahFret; // Inisialisasi atribut jumlah fret
        $this->jenisPickup = $jenisPickup; // Inisialisasi atribut jenis pickup
        $this->foto_produk = $foto_produk; // Inisialisasi atribut foto produk
    } // Penutup blok constructor

    // --- Getter ---
    public function getTipeGitar() { return $this->tipeGitar; } // Method mengambil tipe gitar
    public function getJumlahFret() { return $this->jumlahFret; } // Method mengambil jumlah fret
    public function getJenisPickup() { return $this->jenisPickup; } // Method mengambil jenis pickup
    public function getFotoProduk() { return $this->foto_produk; } // Method mengambil path foto produk

    // --- Setter ---
    public function setTipeGitar($tipeGitar) { $this->tipeGitar = $tipeGitar; } // Method mengubah tipe gitar
    public function setJumlahFret($jumlahFret) { $this->jumlahFret = $jumlahFret; } // Method mengubah jumlah fret
    public function setJenisPickup($jenisPickup) { $this->jenisPickup = $jenisPickup; } // Method mengubah jenis pickup
    public function setFotoProduk($foto_produk) { $this->foto_produk = $foto_produk; } // Method mengubah path foto produk

    // --- Method ---
    public function ubahPickup($pickupBaru) { // Prosedur mengubah komponen pickup
        $pesan = "Pickup " . $this->nama . " diubah dari [" . $this->jenisPickup . "] menjadi [" . $pickupBaru . "]."; // Membuat log string perubahan
        $this->jenisPickup = $pickupBaru; // Memperbarui nilai atribut pickup dengan yang baru
        return $pesan; // Mengembalikan string log 
    } // Penutup method ubahPickup
} // Penutup class Gitar
?> <!-- Tag penutup file PHP -->