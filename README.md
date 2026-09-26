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

## Alasan pemilihan class:
    1. Instrumen: Merupakan class paling dasar untuk semua entitas alat musik. Atributnya mencakup identitas pokok (nama, merek, tahun) yang pasti dimiliki oleh semua instrumen, baik itu alat musik tiup, pukul, maupun petik.

    2. InstrumenSenar: Kategori turunan yang lebih khusus dari instrumen. Alat musik ini pasti dikonstruksi menggunakan senar/dawai pembentuk nada, sehingga membutuhkan data jumlah senar, bahan senar, dan jenis badan resonator. Konsep ini nantinya bisa juga diturunkan ke class lain seperti Biola, Harpa, atau Cello.

    3. Gitar: Merupakan turunan dari instrumen senar. Class ini mendefinisikan spesifikasi teknis yang sangat mengerucut pada anatomi gitar, seperti tipe gitar (elektrik/akustik), hitungan jumlah fret, dan jenis pickup yang terpasang.

