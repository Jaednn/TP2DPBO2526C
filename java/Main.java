import java.util.ArrayList; // import pustaka ArrayList untuk array dinamis
import java.util.List; // import pustaka antarmuka List
import java.util.Scanner; // import pustaka Scanner untuk mengambil input dari user

public class Main // deklarasi class utama program
{
    private static List<Gitar> daftarGitar = new ArrayList<>(); // deklarasi list array dinamis untuk menyimpan object Gitar

    // menghitung lebar kolom (agar tabel dinamis)
    private static int maxLength(List<Gitar> list, String tipe, int noWidth) // fungsi mencari nilai string terpanjang pada kolom
    {
        int maks = tipe.length(); // set nilai awal maksimum berdasarkan panjang nama header (tipe)
        if (tipe.equals("No") && noWidth > maks) maks = noWidth; // khusus kolom nomor, sesuaikan max dengan digit nomor terbanyak

        for (int i = 0; i < list.size(); i++) // perulangan sebanyak elemen di dalam list
        {
            Gitar g = list.get(i); // mengambil object Gitar pada indeks ke-i
            String val = ""; // deklarasi variabel penampung string sementara
            switch (tipe) // percabangan berdasarkan nama kolom yang sedang dicek
            {
                case "No": val = String.valueOf(i + 1); break; // jika tipe "No", ubah indeks urutan jadi string
                case "Nama": val = g.getNama(); break; // jika tipe "Nama", ambil nama gitar
                case "Merek": val = g.getMerek(); break; // jika tipe "Merek", ambil merek gitar
                case "Tahun": val = String.valueOf(g.getTahunProduksi()); break; // jika tipe "Tahun", ambil tahun dan konversi ke string
                case "Jml Senar": val = String.valueOf(g.getJumlahSenar()); break; // ambil senar dan konversi ke string
                case "Bahan Senar": val = g.getBahanSenar(); break; // ambil string bahan senar
                case "Jenis Badan": val = g.getJenisBadan(); break; // ambil string jenis badan
                case "Tipe Gitar": val = g.getTipeGitar(); break; // ambil string tipe gitar
                case "Jml Fret": val = String.valueOf(g.getJumlahFret()); break; // ambil fret dan konversi ke string
                case "Jenis Pickup": val = g.getJenisPickup(); break; // ambil string jenis pickup
            }
            if (val.length() > maks) maks = val.length(); // jika panjang string value lebih besar dari maks, update maks
        }
        return maks; // kembalikan nilai panjang kolom maksimal
    }

    private static void tampilkanTabel(List<Gitar> daftarGitar) // prosedur untuk merender dan menampilkan tabel
    {
        if (daftarGitar.isEmpty()) // pengecekan apakah array data kosong
        {
            System.out.println("\nBelum ada data gitar.\n"); // print pesan data kosong
            return; // hentikan eksekusi prosedur dan kembali
        }

        int noWidth = String.valueOf(daftarGitar.size()).length(); // hitung lebar string dari total jumlah item
        String[] kolom = {"No", "Nama", "Merek", "Tahun", "Jml Senar", "Bahan Senar", // array statis berisi daftar header kolom
                           "Jenis Badan", "Tipe Gitar", "Jml Fret", "Jenis Pickup"};
        int[] lebar = new int[kolom.length]; // array integer untuk menyimpan masing-masing lebar maksimal kolom
        for (int i = 0; i < kolom.length; i++) lebar[i] = maxLength(daftarGitar, kolom[i], noWidth) + 2; // looping menghitung dan menyimpan lebar tiap kolom (ditambah 2 untuk padding)

        StringBuilder garisSb = new StringBuilder("+"); // membuat objek StringBuilder untuk merangkai string garis pembatas
        for (int w : lebar) garisSb.append("-".repeat(w)).append("+"); // looping merangkai karakter '-' sesuai hitungan lebar
        String garis = garisSb.toString(); // mengonversi StringBuilder menjadi String utuh

        System.out.println("\n=== DAFTAR GITAR ==="); // cetak judul tabel
        System.out.println(garis); // cetak garis atas tabel

        StringBuilder header = new StringBuilder("|"); // membuat StringBuilder untuk baris header
        for (int i = 0; i < kolom.length; i++) // looping sebanyak jumlah kolom
            header.append(String.format("%-" + lebar[i] + "s", " " + kolom[i])).append("|"); // memasukkan teks header dengan format padding rata kiri
        System.out.println(header); // cetak baris header tabel
        System.out.println(garis); // cetak garis pembatas bawah header

        for (int i = 0; i < daftarGitar.size(); i++) // perulangan untuk mencetak isi/data dari setiap objek
        {
            Gitar g = daftarGitar.get(i); // mendapatkan instansi Gitar dari list
            String[] nilai = { // membuat array berisi sekumpulan string dari nilai atribut objek tersebut
                String.valueOf(i + 1), g.getNama(), g.getMerek(), String.valueOf(g.getTahunProduksi()), // data dasar
                String.valueOf(g.getJumlahSenar()), g.getBahanSenar(), g.getJenisBadan(), // data level 1
                g.getTipeGitar(), String.valueOf(g.getJumlahFret()), g.getJenisPickup() // data level 2
            };
            StringBuilder row = new StringBuilder("|"); // inisiasi pembangun string baris
            for (int j = 0; j < kolom.length; j++) // looping memformat data ke dalam sel tabel
                row.append(String.format("%-" + lebar[j] + "s", " " + nilai[j] + " ")).append("|"); // gabungkan nilai data dengan format jarak padding
            System.out.println(row); // cetak baris data tersebut ke layar
        }
        System.out.println(garis); // cetak garis penutup paling bawah tabel
    }

    public static void main(String[] args) // method main tempat program mulai berjalan
    {
        Scanner sc = new Scanner(System.in); // instansiasi objek Scanner untuk membaca input keyboard

        // 5 object awal (wajib ada sebelum input user)
        daftarGitar.add(new Gitar("Fender Jimi Hendrix Stratocaster", "Fender", 2024, 6, "Nickel", "Solid Body", "Electric", 21, "SSS")); // simpan objek 1 ke dalam array
        daftarGitar.add(new Gitar("Gibson Les Paul Custom '68", "Gibson", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker")); // simpan objek 2 ke dalam array
        daftarGitar.add(new Gitar("Gibson J-45", "Gibson", 2024, 6, "Steel", "Dreadnought", "Acoustic", 20, "None")); // simpan objek 3 ke dalam array
        daftarGitar.add(new Gitar("Yamaha CG122MS", "Yamaha", 2023, 6, "Nylon", "Classical", "Classical", 19, "None")); // simpan objek 4 ke dalam array
        daftarGitar.add(new Gitar("Yamaha Pacifica 611VFM", "Yamaha", 2024, 6, "Nickel", "Solid Body", "Electric", 22, "Humbucker + P90")); // simpan objek 5 ke dalam array

        int pilihan; // variabel untuk menampung input menu user

        do // lakukan looping minimal 1 kali
        {
            System.out.println("\n=== MENU DATA GITAR ==="); // tampilkan teks menu
            System.out.println("1. Tampilkan Daftar Gitar"); // tampilkan pilihan 1
            System.out.println("2. Tambah Gitar Baru"); // tampilkan pilihan 2
            System.out.println("3. Keluar"); // tampilkan pilihan 3
            System.out.print("Pilih menu: "); // tampilkan prompt input

            while (!sc.hasNextInt()) // looping error handling apabila input bukan integer
            {
                System.out.println("Input tidak valid. Masukkan angka."); // beritahu user input salah
                sc.next(); // memakan buffer input yang salah agar tidak infinite loop
            }
            pilihan = sc.nextInt(); // baca input angka menu
            sc.nextLine(); // baca karakter enter (newline) sisa untuk membersihkan buffer

            if (pilihan == 1) // percabangan jika user pilih 1
            {
                tampilkanTabel(daftarGitar); // panggil method render tabel
            }
            else if (pilihan == 2) // percabangan jika user pilih 2
            {
                String nama, merek, bahanSenar, jenisBadan, tipeGitar, jenisPickup; // deklarasi variabel penampung teks
                int tahunProduksi, jumlahSenar, jumlahFret; // deklarasi variabel penampung angka

                System.out.println("\nMasukkan data gitar baru:"); // cetak judul input
                System.out.print("Nama          : "); // cetak prompt input
                nama = sc.nextLine(); // terima input teks ber-spasi untuk nama
                System.out.print("Merek         : "); // cetak prompt input
                merek = sc.nextLine(); // terima input teks merek

                while (true) // looping handling validasi tahun
                {
                    System.out.print("Tahun Produksi: "); // cetak prompt input tahun
                    if (sc.hasNextInt()) // cek apakah input merupakan angka
                    {
                        tahunProduksi = sc.nextInt(); // baca input angka tahun
                        if (tahunProduksi > 1900) break; // jika tahun rasional (lebih dari 1900), keluar dari loop validasi
                        System.out.println("Input tidak valid. Masukkan tahun yang benar."); // peringatan nilai tidak valid
                    }
                    else // jika input bukan angka
                    {
                        System.out.println("Input tidak valid. Masukkan angka."); // peringatan harus angka
                        sc.next(); // buang buffer yang error
                    }
                }
                sc.nextLine(); // buang sisa enter di stream

                while (true) // looping handling validasi jumlah senar
                {
                    System.out.print("Jumlah Senar  : "); // cetak prompt input senar
                    if (sc.hasNextInt()) // cek apakah input merupakan angka
                    {
                        jumlahSenar = sc.nextInt(); // baca input angka senar
                        if (jumlahSenar > 0) break; // jika senar tidak negatif/nol, keluar loop
                        System.out.println("Input tidak valid. Harus >= 1."); // peringatan nilai harus wajar
                    }
                    else // jika input bukan angka
                    {
                        System.out.println("Input tidak valid. Masukkan angka."); // peringatan tipe data
                        sc.next(); // bersihkan sisa buffer
                    }
                }
                sc.nextLine(); // buang sisa enter

                System.out.print("Bahan Senar   : "); // prompt input
                bahanSenar = sc.nextLine(); // ambil input teks bahan
                System.out.print("Jenis Badan   : "); // prompt input
                jenisBadan = sc.nextLine(); // ambil input teks bodi
                System.out.print("Tipe Gitar    : "); // prompt input
                tipeGitar = sc.nextLine(); // ambil input teks tipe

                while (true) // looping handling validasi fret
                {
                    System.out.print("Jumlah Fret   : "); // prompt fret
                    if (sc.hasNextInt()) // cek format number
                    {
                        jumlahFret = sc.nextInt(); // ambil data num
                        if (jumlahFret > 0) break; // jika > 0, stop loop
                        System.out.println("Input tidak valid. Harus >= 1."); // warning error limit
                    }
                    else // format salah
                    {
                        System.out.println("Input tidak valid. Masukkan angka."); // cetak warning
                        sc.next(); // clear terminal stream buffer
                    }
                }
                sc.nextLine(); // buang sisa escape string enter

                System.out.print("Jenis Pickup  : "); // prompt jenis pickup
                jenisPickup = sc.nextLine(); // masukkan nilai pickup string

                daftarGitar.add(new Gitar(nama, merek, tahunProduksi, jumlahSenar, // instansiasi dan tambahkan objek baru ke array list
                        bahanSenar, jenisBadan, tipeGitar, jumlahFret, jenisPickup)); // meneruskan parameter constructor
                System.out.println("\nGitar berhasil ditambahkan!"); // cetak log sukses
            }
            else if (pilihan != 3) // jika user asal isi angka selain 1, 2, atau 3
            {
                System.out.println("Pilihan tidak valid."); // infokan error case
            }

        } while (pilihan != 3); // kondisi perulangan akan berlanjut terus kecuali user memasukkan angka 3

        System.out.println("\nTerima kasih sudah menggunakan sistem data gitar!"); // cetak kalimat perpisahan jika loop berhenti
        sc.close(); // menutup koneksi io Scanner untuk menghemat memori
    } // batas akhir eksekusi method main
} // batas akhir struct class Main