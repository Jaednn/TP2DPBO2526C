<?php // Tag pembuka file PHP
// class Instrumen (Parent / Base class paling dasar)
class Instrumen { // Deklarasi class utama Instrumen
    protected $nama; // Deklarasi atribut nama dengan visibilitas protected agar bisa diakses class anak
    protected $merek; // Deklarasi atribut merek dengan visibilitas protected
    protected $tahunProduksi; // Deklarasi atribut tahun produksi dengan visibilitas protected

    public function __construct($nama, $merek, $tahunProduksi) { // Method constructor yang dipanggil saat objek dibuat
        $this->nama = $nama; // Inisialisasi atribut nama dari parameter
        $this->merek = $merek; // Inisialisasi atribut merek dari parameter
        $this->tahunProduksi = $tahunProduksi; // Inisialisasi atribut tahun produksi dari parameter
    } // Penutup blok constructor

    // --- Getter ---
    public function getNama() { return $this->nama; } // Method untuk mengambil nilai atribut nama
    public function getMerek() { return $this->merek; } // Method untuk mengambil nilai atribut merek
    public function getTahunProduksi() { return $this->tahunProduksi; } // Method untuk mengambil nilai atribut tahun produksi

    // --- Setter ---
    public function setNama($nama) { $this->nama = $nama; } // Method untuk mengubah nilai atribut nama
    public function setMerek($merek) { $this->merek = $merek; } // Method untuk mengubah nilai atribut merek
    public function setTahunProduksi($tahunProduksi) { $this->tahunProduksi = $tahunProduksi; } // Method untuk mengubah nilai atribut tahun produksi

    // --- Method ---
    public function tampilkanInfo() { // Prosedur untuk menampilkan info dasar instrumen
        return "Nama: " . $this->nama . ", Merek: " . $this->merek . ", Tahun: " . $this->tahunProduksi; // Mengembalikan string gabungan dari atribut-atribut dasar
    } // Penutup method tampilkanInfo

    public function mainkan() { // Prosedur untuk mensimulasikan alat musik dimainkan
        return $this->nama . " (" . $this->merek . ") sedang dimainkan."; // Mengembalikan pesan bahwa instrumen sedang dimainkan
    } // Penutup method mainkan
} // Penutup class Instrumen
?> <!-- Tag penutup file PHP -->