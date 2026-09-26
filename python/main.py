from Gitar import Gitar # mengimpor class ujung (Gitar) untuk dapat diinstansiasi di file ini

daftarGitar = [] # deklarasi list kosong yang akan menampung objek-objek Gitar secara dinamis


# menghitung lebar kolom untuk tabel (dinamis)
def maxLength(list_gitar, tipe, no_width): # definisi fungsi penghitung string terpanjang
    maks = max(len(tipe), no_width if tipe == "No" else 0) # set panjang maksimal awal, ambil mana yang lebih besar antara nama kolom atau digit nomor
    for i, g in enumerate(list_gitar): # perulangan untuk memeriksa tiap elemen pada list beserta indexnya
        if tipe == "No": # jika yang dicek adalah kolom Nomor
            val = str(i + 1) # val berisi urutan indeks ditambah 1
        elif tipe == "Nama": # jika kolom Nama
            val = g.getNama() # panggil getter nama
        elif tipe == "Merek": # jika kolom Merek
            val = g.getMerek() # panggil getter merek
        elif tipe == "Tahun": # jika kolom Tahun
            val = str(g.getTahunProduksi()) # panggil getter tahun dan konversi ke string
        elif tipe == "Jml Senar": # jika kolom jumlah senar
            val = str(g.getJumlahSenar()) # panggil getter senar dan konversi ke string
        elif tipe == "Bahan Senar": # jika kolom bahan senar
            val = g.getBahanSenar() # panggil getter bahan senar
        elif tipe == "Jenis Badan": # jika kolom jenis badan
            val = g.getJenisBadan() # panggil getter jenis badan
        elif tipe == "Tipe Gitar": # jika kolom tipe gitar
            val = g.getTipeGitar() # panggil getter tipe gitar
        elif tipe == "Jml Fret": # jika kolom jumlah fret
            val = str(g.getJumlahFret()) # panggil getter fret dan ubah ke string
        elif tipe == "Jenis Pickup": # jika kolom pickup
            val = g.getJenisPickup() # panggil getter pickup
        else: # blok pertahanan jika tipe tidak valid
            val = "" # isi string kosong
        maks = max(maks, len(val)) # update nilai 'maks' bila panjang 'val' yang baru lebih besar
    return maks # kembalikan angka panjang terbesar dari satu kolom


def tampilkanTabel(list_gitar): # definisi prosedur untuk menggambar tabel data ke CLI
    if not list_gitar: # kondisi jika list dalam keadaan kosong
        print("\nBelum ada data gitar.\n") # cetak pemberitahuan data kosong
        return # hentikan proses dan keluar dari fungsi

    no_width = len(str(len(list_gitar))) # menghitung berapa digit jumlah total baris untuk format penomoran (misal: "10" -> 2 digit)
    kolom = ["No", "Nama", "Merek", "Tahun", "Jml Senar", "Bahan Senar", # mendefinisikan array daftar nama kolom tabel
             "Jenis Badan", "Tipe Gitar", "Jml Fret", "Jenis Pickup"]
    lebar = {k: maxLength(list_gitar, k, no_width) + 2 for k in kolom} # dictionary comprehension: hitung & simpan lebar maksimal tiap kolom + 2 spasi padding

    garis = "+" + "+".join("-" * lebar[k] for k in kolom) + "+" # membangun string pemisah baris tabel (menggunakan join + karakter dash)

    print("\n=== DAFTAR GITAR ===") # print header
    print(garis) # print frame garis teratas tabel
    header = "|" + "|".join(" {}".format(k).ljust(lebar[k]) for k in kolom) + "|" # membangun susunan baris teks header kolom dengan padding (ljust)
    print(header) # print baris header kolom
    print(garis) # print frame pemisah antara header dan data

    for i, g in enumerate(list_gitar): # perulangan merender baris untuk tiap objek gitar dalam list
        nilai = { # dictionary mapper untuk mencocokkan setiap nama kolom dengan nilai string dari getter yang sesuai
            "No": str(i + 1), # isi untuk kolom nomor
            "Nama": g.getNama(), # isi kolom nama
            "Merek": g.getMerek(), # isi kolom merek
            "Tahun": str(g.getTahunProduksi()), # isi kolom tahun
            "Jml Senar": str(g.getJumlahSenar()), # isi kolom senar
            "Bahan Senar": g.getBahanSenar(), # isi kolom bahan senar
            "Jenis Badan": g.getJenisBadan(), # isi kolom jenis badan
            "Tipe Gitar": g.getTipeGitar(), # isi kolom tipe gitar
            "Jml Fret": str(g.getJumlahFret()), # isi kolom fret
            "Jenis Pickup": g.getJenisPickup(), # isi kolom jenis pickup
        }
        row = "|" + "|".join((" " + nilai[k] + " ").ljust(lebar[k]) for k in kolom) + "|" # membangun satu baris tabel (string formatting rata kiri)
        print(row) # cetak baris object tersebut ke layar

    print(garis) # cetak garis frame batas terbawah tabel


def main(): # definisi prosedur controller utama program
    # 5 object awal (wajib ada sebelum input user)
    daftarGitar.append(Gitar("Fender Jimi Hendrix Stratocaster", "Fender", 2024, 6, "Nickel", "Solid Body", "Electric", 21, "SSS")) # instansiasi objek gitar lalu memindahkannya (append) ke dalam array
    daftarGitar.append(Gitar("Gibson Les Paul Custom '68", "Gibson", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker")) # insert objek 2
    daftarGitar.append(Gitar("Gibson J-45", "Gibson", 2024, 6, "Steel", "Dreadnought", "Acoustic", 20, "None")) # insert objek 3
    daftarGitar.append(Gitar("Yamaha CG122MS", "Yamaha", 2023, 6, "Nylon", "Classical", "Classical", 19, "None")) # insert objek 4
    daftarGitar.append(Gitar("Yamaha Pacifica 611VFM", "Yamaha", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker + P90")) # insert objek 5

    while True: # perulangan infinite (tidak terbatas) untuk antarmuka/menu aplikasi console
        print("\n=== MENU DATA GITAR ===") # print nama aplikasi
        print("1. Tampilkan Daftar Gitar") # print opsi menu 1
        print("2. Tambah Gitar Baru") # print opsi menu 2
        print("3. Keluar") # print opsi menu 3

        pilihan = input("Pilih menu: ") # mengambil input teks opsi dari user

        if pilihan == "1": # kondisional jika user ketik '1'
            tampilkanTabel(daftarGitar) # panggil prosedur rendering tabel dengan mengirimkan list gitar

        elif pilihan == "2": # kondisional jika user ketik '2' (Tambah Data)
            print("\nMasukkan data gitar baru:") # print judul input
            nama = input("Nama          : ") # input tipe string untuk atribut nama
            merek = input("Merek         : ") # input tipe string untuk atribut merek

            while True: # loop while khusus untuk validasi input tahun produksi
                try: # blok try untuk mencoba konversi string -> integer
                    tahun_produksi = int(input("Tahun Produksi: ")) # ambil teks, paksa menjadi int
                    if tahun_produksi > 1900: # jika rentang tahun masuk akal
                        break # keluar dari infinite loop validasi tahun
                    print("Input tidak valid. Masukkan tahun yang benar.") # tegur user bila tahun aneh
                except ValueError: # handle penolakan jika input user adalah huruf (bukan angka)
                    print("Input tidak valid. Masukkan angka.") # tampilkan notifikasi tipe data yang diminta

            while True: # perulangan validasi input jumlah senar
                try: # coba parsing tipe string ke numerik 
                    jumlah_senar = int(input("Jumlah Senar  : ")) # input diolah menjadi integer (int)
                    if jumlah_senar > 0: # jika jumlah rasional (positif)
                        break # valid, keluar dari loop
                    print("Input tidak valid. Harus >= 1.") # beritahu user bahwa senar minimal ada 1
                except ValueError: # exception saat parsing huruf gagal
                    print("Input tidak valid. Masukkan angka.") # info perbaikan input

            bahan_senar = input("Bahan Senar   : ") # input raw string bahan senar
            jenis_badan = input("Jenis Badan   : ") # input raw string jenis body
            tipe_gitar = input("Tipe Gitar    : ") # input raw string jenis tipe

            while True: # loop khusus memvalidasi pemasukan data fret
                try: # mode error checking aktif 
                    jumlah_fret = int(input("Jumlah Fret   : ")) # menampung input number fret
                    if jumlah_fret > 0: # minimal harus ada 1 fret
                        break # validasi lolos, break out loop
                    print("Input tidak valid. Harus >= 1.") # teguran invalid
                except ValueError: # catch saat casting integer bertabrakan dengan karakter
                    print("Input tidak valid. Masukkan angka.") # instruksi agar masukkan murni angka

            jenis_pickup = input("Jenis Pickup  : ") # mengambil input tipe text untuk jenis spool gitar

            daftarGitar.append(Gitar(nama, merek, tahun_produksi, jumlah_senar, # membuat instansi/objek gitar baru berdasarkan variabel-variabel inputan tersebut
                                      bahan_senar, jenis_badan, tipe_gitar, # menyalurkan parameter ke constructor
                                      jumlah_fret, jenis_pickup)) # proses mem-push objek ke list utama di dalam RAM 
            print("\nGitar berhasil ditambahkan!") # tampilkan info bahwa proses memori tambah item sukses

        elif pilihan == "3": # jika menu yang dipilih 3
            print("\nTerima kasih sudah menggunakan sistem data gitar!") # print perpisahan
            break # hentikan perulangan tak terbatas loop utama main

        else: # apabila masukan pilihan di luar 1, 2, dan 3 (seperti huruf atau angka lain)
            print("Pilihan tidak valid.") # print teguran ketidakcocokan perintah opsi


if __name__ == "__main__": # entry point magic identifier dunder (akan true hanya jika script di run secara mandiri)
    main() # panggil/jalankan fungsi main