#include "Gitar.cpp" // import class turunan paling ujung
#include <iostream> // import library untuk I/O
#include <vector> // import library array dinamis / vector
#include <iomanip> // import library manipulasi tata letak output (setw)
#include <limits> // import library untuk mengatur limit input stream
using namespace std; // menggunakan standard namespace

vector<Gitar> daftarGitar; // deklarasi array / vector untuk menyimpan data objek

// Fungsi cari panjang string maksimal di kolom tertentu (agar tabel dinamis)
int maxLength(vector<Gitar>& list, string tipe, int noWidth) // fungsi mencari nilai string terpanjang
{
    int maks = (int)tipe.size(); // inisialisasi nilai maksimum dari panjang nama kolom
    if (tipe == "No") maks = noWidth > maks ? noWidth : maks; // jika kolom No, evaluasi panjang urutan datanya

    for (size_t i = 0; i < list.size(); i++) // looping ke semua elemen array
    {
        Gitar& g = list[i]; // mengambil referensi iterasi saat ini
        string val; // deklarasi penampung string sementara
        if (tipe == "No") val = to_string(i + 1); // jika cek kolom nomor maka konversi iterasi angka ke string
        else if (tipe == "Nama") val = g.getNama(); // mengambil nilai dari getter nama
        else if (tipe == "Merek") val = g.getMerek(); // mengambil nilai dari getter merek
        else if (tipe == "Tahun") val = to_string(g.getTahunProduksi()); // mengambil nilai dan mengonversi ke string
        else if (tipe == "Jml Senar") val = to_string(g.getJumlahSenar()); // mengambil nilai dan mengonversi ke string
        else if (tipe == "Bahan Senar") val = g.getBahanSenar(); // mengambil nilai dari getter bahan senar
        else if (tipe == "Jenis Badan") val = g.getJenisBadan(); // mengambil nilai dari getter jenis badan
        else if (tipe == "Tipe Gitar") val = g.getTipeGitar(); // mengambil nilai dari getter tipe gitar
        else if (tipe == "Jml Fret") val = to_string(g.getJumlahFret()); // mengambil nilai dan mengonversi ke string
        else if (tipe == "Jenis Pickup") val = g.getJenisPickup(); // mengambil nilai dari getter jenis pickup

        if ((int)val.length() > maks) maks = (int)val.length(); // jika elemen lebih panjang dari nilai maks maka di update nilainya
    }
    return maks; // mengembalikan nilai batas panjang kolom terbesar
}

void tampilkanTabel(vector<Gitar>& daftarGitar) // prosedur menampilkan data di tabel
{
    if (daftarGitar.empty()) // jika array kosong
    {
        cout << "\nBelum ada data gitar.\n"; // print data kosong
        return; // keluar dari prosedur
    }

    int noWidth = (int)to_string(daftarGitar.size()).length(); // menghitung digit nomor terpanjang

    int wNo     = maxLength(daftarGitar, "No", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wNama   = maxLength(daftarGitar, "Nama", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wMerek  = maxLength(daftarGitar, "Merek", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wTahun  = maxLength(daftarGitar, "Tahun", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wSenar  = maxLength(daftarGitar, "Jml Senar", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wBahan  = maxLength(daftarGitar, "Bahan Senar", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wBadan  = maxLength(daftarGitar, "Jenis Badan", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wTipe   = maxLength(daftarGitar, "Tipe Gitar", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wFret   = maxLength(daftarGitar, "Jml Fret", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin
    int wPickup = maxLength(daftarGitar, "Jenis Pickup", noWidth) + 2; // mengkalkulasi lebar kolom ditambah margin

    auto garis = [&]() { // deklarasi fungsi lambda untuk cetak garis frame tabel
        cout << "+" << string(wNo, '-') // membuat garis sesuai border No
             << "+" << string(wNama, '-') // membuat garis sesuai border Nama
             << "+" << string(wMerek, '-') // membuat garis sesuai border Merek
             << "+" << string(wTahun, '-') // membuat garis sesuai border Tahun
             << "+" << string(wSenar, '-') // membuat garis sesuai border Senar
             << "+" << string(wBahan, '-') // membuat garis sesuai border Bahan
             << "+" << string(wBadan, '-') // membuat garis sesuai border Badan
             << "+" << string(wTipe, '-') // membuat garis sesuai border Tipe
             << "+" << string(wFret, '-') // membuat garis sesuai border Fret
             << "+" << string(wPickup, '-') << "+\n"; // membuat garis sesuai border Pickup
    };

    cout << "\n=== DAFTAR GITAR ===\n"; // print judul tabel
    garis(); // memanggil frame atas tabel
    cout << "|" << left << setw(wNo) << " No" // print header kolom No
         << "|" << setw(wNama) << " Nama" // print header kolom Nama
         << "|" << setw(wMerek) << " Merek" // print header kolom Merek
         << "|" << setw(wTahun) << " Tahun" // print header kolom Tahun
         << "|" << setw(wSenar) << " Jml Senar" // print header kolom Senar
         << "|" << setw(wBahan) << " Bahan Senar" // print header kolom Bahan
         << "|" << setw(wBadan) << " Jenis Badan" // print header kolom Badan
         << "|" << setw(wTipe) << " Tipe Gitar" // print header kolom Tipe
         << "|" << setw(wFret) << " Jml Fret" // print header kolom Fret
         << "|" << setw(wPickup) << " Jenis Pickup" << "|\n"; // print header kolom Pickup
    garis(); // memanggil frame pembatas isi tabel

    for (size_t i = 0; i < daftarGitar.size(); i++) // looping ke semua elemen array
    {
        Gitar& g = daftarGitar[i]; // mengambil instance objek iterasi terkini
        cout << "|" << left << setw(wNo) << (" " + to_string(i + 1) + " ") // print index list + 1
             << "|" << setw(wNama) << (" " + g.getNama() + " ") // print value atribut Nama
             << "|" << setw(wMerek) << (" " + g.getMerek() + " ") // print value atribut Merek
             << "|" << setw(wTahun) << (" " + to_string(g.getTahunProduksi()) + " ") // print value atribut Tahun
             << "|" << setw(wSenar) << (" " + to_string(g.getJumlahSenar()) + " ") // print value atribut Senar
             << "|" << setw(wBahan) << (" " + g.getBahanSenar() + " ") // print value atribut Bahan
             << "|" << setw(wBadan) << (" " + g.getJenisBadan() + " ") // print value atribut Badan
             << "|" << setw(wTipe) << (" " + g.getTipeGitar() + " ") // print value atribut Tipe
             << "|" << setw(wFret) << (" " + to_string(g.getJumlahFret()) + " ") // print value atribut Fret
             << "|" << setw(wPickup) << (" " + g.getJenisPickup() + " ") << "|\n"; // print value atribut Pickup
    }
    garis(); // memanggil frame garis paling bawah
}

int main() // program utama berjalan mulai dari sini
{
    // 5 object awal (wajib ada sebelum input user)
    daftarGitar.push_back(Gitar("Fender Jimi Hendrix Stratocaster", "Fender", 2024, 6, "Nickel", "Solid Body", "Electric", 21, "SSS")); // memasukkan objek ke dalam array
    daftarGitar.push_back(Gitar("Gibson Les Paul Custom '68", "Gibson", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker")); // memasukkan objek ke dalam array
    daftarGitar.push_back(Gitar("Gibson J-45", "Gibson", 2024, 6, "Steel", "Dreadnought", "Acoustic", 20, "None")); // memasukkan objek ke dalam array
    daftarGitar.push_back(Gitar("Yamaha CG122MS", "Yamaha", 2023, 6, "Nylon", "Classical", "Classical", 19, "None")); // memasukkan objek ke dalam array
    daftarGitar.push_back(Gitar("Yamaha Pacifica 611VFM", "Yamaha", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker + P90")); // memasukkan objek ke dalam array

    int pilihan; // deklarasi tampungan menu

    do // akan berulang setidaknya satu kali
    {
        cout << "\n=== MENU DATA GITAR ===\n"; // print header menu
        cout << "1. Tampilkan Daftar Gitar\n"; // print pilihan 1
        cout << "2. Tambah Gitar Baru\n"; // print pilihan 2
        cout << "3. Keluar\n"; // print pilihan 3
        cout << "Pilih menu: "; // print dialog form

        if (!(cin >> pilihan)) // jika input error / tidak berbentuk angka
        {
            cout << "Input tidak valid.\n"; // pesan error handling non num
            cin.clear(); // hapus mode error status di stream cin
            cin.ignore(numeric_limits<streamsize>::max(), '\n'); // membuang buffer lama menghindari infinite loop
            continue; // lanjut evaluasi loop baru
        }

        if (pilihan == 1) // opsi 1
        {
            tampilkanTabel(daftarGitar); // panggil prosedur tampil data
        }
        else if (pilihan == 2) // opsi 2
        {
            string nama, merek, bahanSenar, jenisBadan, tipeGitar, jenisPickup; // inisialisasi placeholder teks
            int tahunProduksi, jumlahSenar, jumlahFret; // inisialisasi placeholder angka

            cin.ignore(); // menetralkan newline buffer sisa
            cout << "\nMasukkan data gitar baru:\n"; // print text heading 
            cout << "Nama          : "; getline(cin, nama); // input data dengan pemisah spasi
            cout << "Merek         : "; getline(cin, merek); // input data dengan pemisah spasi

            while (true) // looping handling validasi
            {
                cout << "Tahun Produksi: "; // label prompt
                cin >> tahunProduksi; // input integer
                if (cin.fail() || tahunProduksi <= 1900) // jika bukan angka atau masuk rentang tidak valid
                {
                    cout << "Input tidak valid. Masukkan tahun yang benar.\n"; // print teguran
                    cin.clear(); // restore cin flag
                    cin.ignore(numeric_limits<streamsize>::max(), '\n'); // buang karakter input gagal
                }
                else { cin.ignore(numeric_limits<streamsize>::max(), '\n'); break; } // jika berhasil break the loop
            }

            while (true) // looping handling validasi
            {
                cout << "Jumlah Senar  : "; // label prompt
                cin >> jumlahSenar; // input int senar
                if (cin.fail() || jumlahSenar <= 0) // jika input negatif
                {
                    cout << "Input tidak valid. Masukkan angka >= 1.\n"; // print peringatan
                    cin.clear(); // clear buffer flag error
                    cin.ignore(numeric_limits<streamsize>::max(), '\n'); // skip bad input format 
                }
                else { cin.ignore(numeric_limits<streamsize>::max(), '\n'); break; } // stop looping flag ok
            }

            cout << "Bahan Senar   : "; getline(cin, bahanSenar); // input raw string
            cout << "Jenis Badan   : "; getline(cin, jenisBadan); // input raw string
            cout << "Tipe Gitar    : "; getline(cin, tipeGitar); // input raw string

            while (true) // looping validasi
            {
                cout << "Jumlah Fret   : "; // prompt menu input 
                cin >> jumlahFret; // scan in format num
                if (cin.fail() || jumlahFret <= 0) // jika huruf yang ketik atau nilai negatif
                {
                    cout << "Input tidak valid. Masukkan angka >= 1.\n"; // print peringatan error 
                    cin.clear(); // clear IO error status resetter
                    cin.ignore(numeric_limits<streamsize>::max(), '\n'); // remove dirty buffer in stream mem
                }
                else { cin.ignore(numeric_limits<streamsize>::max(), '\n'); break; } // exit handler loop string buffer reset
            }

            cout << "Jenis Pickup  : "; getline(cin, jenisPickup); // input raw string kalimat

            daftarGitar.push_back(Gitar(nama, merek, tahunProduksi, jumlahSenar, bahanSenar, jenisBadan, tipeGitar, jumlahFret, jenisPickup)); // memasukkan object inputan baru ke dalam array list
            cout << "\nGitar berhasil ditambahkan!\n"; // print notifikasi berhasil
        }
        else if (pilihan != 3) // jika memilih case yg salah
        {
            cout << "Pilihan tidak valid.\n"; // cetak error prompt
        }

    } while (pilihan != 3); // jika input 3 loop program break dan menuju EOF

    cout << "\nTerima kasih sudah menggunakan sistem data gitar!\n"; // pamitan console return text message
    return 0; // return system process normal ok code
}