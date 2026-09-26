#include "InstrumenSenar.cpp" // import class parent level 2 (InstrumenSenar)

// class Gitar merupakan turunan dari InstrumenSenar (membentuk Multilevel Inheritance)
class Gitar : public InstrumenSenar // deklarasi class turunan kedua
{
    private: // modifier private agar atribut hanya bisa diakses di dalam class ini saja
        // atribut spesifik gitar
        string tipeGitar; // deklarasi atribut tipeGitar (contoh: Electric, Acoustic)
        int jumlahFret; // deklarasi atribut jumlahFret (contoh: 21, 22, 24)
        string jenisPickup; // deklarasi atribut jenisPickup (contoh: SSS, Humbucker)

    public: // modifier public agar method dan constructor bisa dipanggil dari luar (seperti di main)
        // constructor kosong
        Gitar() {} // constructor default tanpa parameter

        // constructor dengan parameter lengkap, memanggil constructor parent (InstrumenSenar)
        Gitar(string nama, string merek, int tahunProduksi, // parameter warisan dari Instrumen level 1
              int jumlahSenar, string bahanSenar, string jenisBadan, // parameter warisan dari InstrumenSenar level 2
              string tipeGitar, int jumlahFret, string jenisPickup) // parameter khusus class Gitar level 3
            : InstrumenSenar(nama, merek, tahunProduksi, jumlahSenar, bahanSenar, jenisBadan) // melimpahkan parameter ke constructor class parent
        {
            this->tipeGitar = tipeGitar; // inisialisasi / mengubah value atribut dengan value baru
            this->jumlahFret = jumlahFret; // inisialisasi / mengubah value atribut dengan value baru
            this->jenisPickup = jenisPickup; // inisialisasi / mengubah value atribut dengan value baru
        }

        // --- Setter ---
        void setTipeGitar(const string& tipeGitar) { this->tipeGitar = tipeGitar; } // mengubah value atribut dengan value baru
        void setJumlahFret(int jumlahFret) { this->jumlahFret = jumlahFret; } // mengubah value atribut dengan value baru
        void setJenisPickup(const string& jenisPickup) { this->jenisPickup = jenisPickup; } // mengubah value atribut dengan value baru

        // --- Getter ---
        string getTipeGitar() const { return tipeGitar; } // mengembalikan nilai tipe gitar
        int getJumlahFret() const { return jumlahFret; } // mengembalikan nilai jumlah fret
        string getJenisPickup() const { return jenisPickup; } // mengembalikan nilai jenis pickup

        // --- Method ---
        // method spesifik class Gitar
        void ubahPickup() const // prosedur aksi mengubah / menyesuaikan pickup
        {
            cout << "Pickup " << jenisPickup << " pada gitar " // print teks string dan jenis pickup
                 << nama << " sedang disesuaikan untuk mengubah tone." << endl; // print nama instrumen dan newline
        }
}; // penutup class