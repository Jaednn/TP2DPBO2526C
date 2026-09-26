<?php // Tag pembuka file PHP
require_once "Instrumen.php"; // Mengimpor file parent class Instrumen agar bisa diwarisi

// class InstrumenSenar merupakan turunan dari class Instrumen
class InstrumenSenar extends Instrumen { // Deklarasi class InstrumenSenar yang mewarisi class Instrumen
    protected $jumlahSenar; // Deklarasi atribut khusus jumlah senar dengan visibilitas protected
    protected $bahanSenar; // Deklarasi atribut khusus bahan senar dengan visibilitas protected
    protected $jenisBadan; // Deklarasi atribut khusus jenis badan gitar dengan visibilitas protected

    public function __construct($nama, $merek, $tahunProduksi, $jumlahSenar, $bahanSenar, $jenisBadan) { // Constructor dengan parameter gabungan
        // meneruskan atribut umum ke constructor parent
        parent::__construct($nama, $merek, $tahunProduksi); // Memanggil constructor class parent (Instrumen)

        $this->jumlahSenar = $jumlahSenar; // Inisialisasi atribut jumlah senar
        $this->bahanSenar = $bahanSenar; // Inisialisasi atribut bahan senar
        $this->jenisBadan = $jenisBadan; // Inisialisasi atribut jenis badan
    } // Penutup blok constructor

    // --- Getter ---
    public function getJumlahSenar() { return $this->jumlahSenar; } // Method mengambil nilai jumlah senar
    public function getBahanSenar() { return $this->bahanSenar; } // Method mengambil nilai bahan senar
    public function getJenisBadan() { return $this->jenisBadan; } // Method mengambil nilai jenis badan

    // --- Setter ---
    public function setJumlahSenar($jumlahSenar) { $this->jumlahSenar = $jumlahSenar; } // Method mengubah nilai jumlah senar
    public function setBahanSenar($bahanSenar) { $this->bahanSenar = $bahanSenar; } // Method mengubah nilai bahan senar
    public function setJenisBadan($jenisBadan) { $this->jenisBadan = $jenisBadan; } // Method mengubah nilai jenis badan

    // --- Method ---
    public function setelSenar() { // Prosedur untuk mensimulasikan penyetelan senar
        return $this->nama . " sedang disetel " . $this->jumlahSenar . " senarnya (bahan " . $this->bahanSenar . ")."; // Mengembalikan string aksi penyetelan
    } // Penutup method setelSenar
} // Penutup class InstrumenSenar
?> <!-- Tag penutup file PHP -->