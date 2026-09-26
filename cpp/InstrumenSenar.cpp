#include "Instrumen.cpp" // import class parent

// class InstrumenSenar merupakan turunan dari Instrumen
class InstrumenSenar : public Instrumen // deklarasi class turunan
{
    protected: // modifier protected
        // atribut tambahan
        int jumlahSenar; // deklarasi atribut jumlahSenar
        string bahanSenar; // deklarasi atribut bahanSenar
        string jenisBadan; // deklarasi atribut jenisBadan

    public: // modifier public
        // constructor kosong
        InstrumenSenar() {} // constructor default

        // constructor dengan parameter, memanggil constructor parent (Instrumen)
        InstrumenSenar(string nama, string merek, int tahunProduksi, // parameter untuk base class
                       int jumlahSenar, string bahanSenar, string jenisBadan) // parameter class ini
            : Instrumen(nama, merek, tahunProduksi) // memanggil constructor parent
        {
            this->jumlahSenar = jumlahSenar; // inisialisasi / mengubah value atribut dengan value baru
            this->bahanSenar = bahanSenar; // inisialisasi / mengubah value atribut dengan value baru
            this->jenisBadan = jenisBadan; // inisialisasi / mengubah value atribut dengan value baru
        }

        // --- Setter ---
        void setJumlahSenar(int jumlahSenar) { this->jumlahSenar = jumlahSenar; } // mengubah value atribut dengan value baru
        void setBahanSenar(const string& bahanSenar) { this->bahanSenar = bahanSenar; } // mengubah value atribut dengan value baru
        void setJenisBadan(const string& jenisBadan) { this->jenisBadan = jenisBadan; } // mengubah value atribut dengan value baru

        // --- Getter ---
        int getJumlahSenar() const { return jumlahSenar; } // mengembalikan nilai jumlah senar
        string getBahanSenar() const { return bahanSenar; } // mengembalikan nilai bahan senar
        string getJenisBadan() const { return jenisBadan; } // mengembalikan nilai jenis badan

        // --- Method ---
        // mensimulasikan proses menyetel senar
        void setelSenar() const // prosedur aksi menyetel senar
        {
            cout << nama << " sedang disetel " << jumlahSenar // print nama dan senar
                 << " senarnya (bahan " << bahanSenar << ")." << endl; // print jumlah dan bahan senar
        }
}; // penutup class