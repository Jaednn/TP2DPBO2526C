# Janji
Saya Afzaal Zaidan Febryanto dengan NIM 2508692 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Penjelasan Desain

## Penjelasan Atribut dan Methods
Program ini menggunakan konsep *Multilevel Inheritance* yang terdiri dari 3 hierarki kelas:

### 1. Class `Instrumen` (Base Class / Parent)
Class ini merupakan blueprint paling dasar yang mendefinisikan entitas umum dari sebuah alat musik.
*   **Atribut:**
    *   `nama` (String): Menyimpan nama spesifik dari instrumen (contoh: Fender Stratocaster).
    *   `merek` (String): Menyimpan nama produsen/brand pembuat instrumen.
    *   `tahunProduksi` (Integer): Menyimpan tahun perilisan atau pembuatan instrumen.
*   **Methods:**
    *   *Constructor*, *Getters*, dan *Setters* untuk seluruh atribut.
    *   `tampilkanInfo()`: Menampilkan informasi ringkas mengenai identitas dasar instrumen.
    *   `mainkan()`: Mensimulasikan aksi bahwa instrumen tersebut sedang dimainkan.

### 2. Class `InstrumenSenar` (Turunan dari `Instrumen`)
Class ini mewarisi sifat dari `Instrumen` dan menambahkan detail yang hanya dimiliki oleh alat musik berdawai/petik/gesek.
*   **Atribut:**
    *   `jumlahSenar` (Integer): Menyimpan banyaknya dawai/senar yang digunakan.
    *   `bahanSenar` (String): Menyimpan spesifikasi material senar (contoh: Nickel, Nylon, Steel).
    *   `jenisBadan` (String): Menyimpan bentuk atau konstruksi dari badan resonator instrumen (contoh: Solid Body, Dreadnought).
*   **Methods:**
    *   *Constructor* (memanggil *super*), *Getters*, dan *Setters*.
    *   `setelSenar()`: Mensimulasikan proses menyetel (*tuning*) dawai instrumen agar menghasilkan nada yang harmonis.

### 3. Class `Gitar` (Turunan dari `InstrumenSenar`)
Class ini berada di level paling bawah (ujung *inheritance*) yang mendefinisikan spesifikasi teknis sangat spesifik untuk sebuah gitar.
*   **Atribut:**
    *   `tipeGitar` (String): Kategori utama gitar (contoh: Electric, Acoustic).
    *   `jumlahFret` (Integer): Rentang jangkauan nada pada *fretboard* leher gitar (contoh: 21, 22, 24).
    *   `jenisPickup` (String): Sistem sensor magnetik/piezo untuk menangkap getaran senar (contoh: Humbucker, SSS).
    *   `foto_produk` (String/File): **Khusus bahasa PHP**, atribut ini menyimpan *path* atau URL dari gambar produk yang di-upload.
*   **Methods:**
    *   *Constructor* (memanggil *super* dengan semua atribut dari atas), *Getters*, dan *Setters*.
    *   `ubahPickup()`: Mensimulasikan aksi modifikasi penggantian komponen *pickup* pada gitar.
<img width="162" height="460" alt="diagram" src="https://github.com/user-attachments/assets/4be644fd-767d-4e82-86ed-427d0a5297e3" />
<br>
## Alasan pemilihan class:
- Instrumen: Merupakan class paling dasar untuk semua entitas alat musik. Atributnya mencakup identitas pokok (nama, merek, tahun) yang pasti dimiliki oleh semua instrumen, baik itu alat musik tiup, pukul, maupun petik.

- InstrumenSenar: Kategori turunan yang lebih khusus dari instrumen. Alat musik ini pasti dikonstruksi menggunakan senar/dawai pembentuk nada, sehingga membutuhkan data jumlah senar, bahan senar, dan jenis badan resonator. Konsep ini nantinya bisa juga diturunkan ke class lain seperti Biola, Harpa, atau Cello.

- Gitar: Merupakan turunan dari instrumen senar. Class ini mendefinisikan spesifikasi teknis yang sangat mengerucut pada anatomi gitar, seperti tipe gitar (elektrik/akustik), hitungan jumlah fret, dan jenis pickup yang terpasang.

##Penjelasan Alur Program

- Inisialisasi Data Awal: Saat program dijalankan, sistem akan langsung membuat dan menyimpan 5 (lima) data / objek default ke dalam memori (Array / Vector / List / Session) sebelum interaksi dari user.

- Menu Interaktif: Program akan menampilkan interface menu kepada pengguna. Untuk Java, C++, dan Python berupa menu CLI di terminal. Untuk PHP, berupa tampilan Web lengkap dengan Form HTML.

- Fitur Tambah Data (Add): Pengguna dapat memasukkan data gitar baru. Program telah dilengkapi dengan validasi input (seperti error handling untuk tipe data angka/huruf dan proteksi nilai negatif/irasional). Pada PHP, fitur penambahan ini mendukung upload file gambar secara nyata ke direktori lokal (folder uploads).

- Tampilan Dinamis: Seluruh atribut dari ketiga hierarki kelas (mulai dari nama hingga jenis pickup) ditampilkan secara berurutan di dalam SATU tabel utuh. Pada versi CLI, garis tabel akan menghitung lebar string secara otomatis sehingga padding kolom bersifat dinamis dan rapi. Pada versi PHP, tabel memuat baris gambar visual di kolom paling kiri.

- Manajemen Sesi (Khusus PHP): Program PHP memanfaatkan $_SESSION agar data yang baru ditambahkan tidak hilang saat halaman di-refresh. Terdapat juga tombol/link "Reset" untuk menghapus sesi dan mengembalikan tabel persis ke keadaan 5 objek default awal.

# Dokumentasi
## CPP
<img width="1266" height="775" alt="cpp1" src="https://github.com/user-attachments/assets/f9c3d155-92e9-4320-946e-5be549bd900c" /><br>
<img width="1411" height="385" alt="cpp2" src="https://github.com/user-attachments/assets/265a3bc7-5eea-46d6-b069-73b1402f7901" /><br>
## PYTHON
## JAVA
## PHP
