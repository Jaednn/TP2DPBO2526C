#include <iostream> // import library iostream untuk input dan output
#include <string> // import library string
using namespace std; // menggunakan namespace std agar tidak perlu menulis std::

// class Instrumen (Parent / Base class)
class Instrumen // deklarasi class Instrumen
{
    protected: // modifier protected agar bisa diakses oleh class turunan
        // atribut
        string nama; // deklarasi atribut nama
        string merek; // deklarasi atribut merek
        int tahunProduksi; // deklarasi atribut tahunProduksi

    public: // modifier public agar bisa diakses secara bebas
        // constructor kosong
        Instrumen() {} // constructor default tanpa parameter

        // constructor dengan parameter
        Instrumen(string nama, string merek, int tahunProduksi) // constructor berparameter
        {
            this->nama = nama; // inisialisasi / mengubah value atribut dengan value baru
            this->merek = merek; // inisialisasi / mengubah value atribut dengan value baru
            this->tahunProduksi = tahunProduksi; // inisialisasi / mengubah value atribut dengan value baru
        }

        // --- Setter ---
        void setNama(const string& nama) { this->nama = nama; } // mengubah value atribut dengan value baru
        void setMerek(const string& merek) { this->merek = merek; } // mengubah value atribut dengan value baru
        void setTahunProduksi(int tahunProduksi) { this->tahunProduksi = tahunProduksi; } // mengubah value atribut dengan value baru

        // --- Getter ---
        string getNama() const { return nama; } // mengembalikan nilai nama
        string getMerek() const { return merek; } // mengembalikan nilai merek
        int getTahunProduksi() const { return tahunProduksi; } // mengembalikan nilai tahun produksi

        // --- Method ---
        // menampilkan info dasar instrumen
        void tampilkanInfo() const // prosedur untuk menampilkan data instrumen
        {
            cout << "Nama          : " << nama << endl // print nama
                 << "Merek         : " << merek << endl // print merek
                 << "Tahun Produksi: " << tahunProduksi << endl; // print tahun produksi
        }

        // mensimulasikan instrumen dimainkan
        void mainkan() const // prosedur mensimulasikan bermain
        {
            cout << nama << " (" << merek << ") sedang dimainkan." << endl; // print pesan instrumen dimainkan
        }

        // destructor
        ~Instrumen() {} // destructor untuk dealokasi memori
}; // penutup class