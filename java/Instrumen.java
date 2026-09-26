// class Instrumen (Parent / Base class paling dasar)
public class Instrumen // deklarasi class Instrumen sebagai base class
{
    // atribut
    protected String nama; // deklarasi atribut nama dengan modifier protected agar bisa diakses class anak
    protected String merek; // deklarasi atribut merek dengan modifier protected
    protected int tahunProduksi; // deklarasi atribut tahun produksi dengan modifier protected

    // constructor
    public Instrumen(String nama, String merek, int tahunProduksi) // constructor class dengan parameter
    {
        this.nama = nama; // mengisi value atribut class dengan value dari parameter
        this.merek = merek; // mengisi value atribut class dengan value dari parameter
        this.tahunProduksi = tahunProduksi; // mengisi value atribut class dengan value dari parameter
    }

    // --- Getter ---
    public String getNama() { return nama; } // mengembalikan nilai dari atribut nama
    public String getMerek() { return merek; } // mengembalikan nilai dari atribut merek
    public int getTahunProduksi() { return tahunProduksi; } // mengembalikan nilai dari atribut tahun produksi

    // --- Setter ---
    public void setNama(String nama) { this.nama = nama; } // mengubah nilai atribut nama
    public void setMerek(String merek) { this.merek = merek; } // mengubah nilai atribut merek
    public void setTahunProduksi(int tahunProduksi) { this.tahunProduksi = tahunProduksi; } // mengubah nilai atribut tahun produksi

    // --- Method ---
    public void tampilkanInfo() // prosedur untuk menampilkan informasi instrumen
    {
        System.out.println("Nama          : " + nama); // print nilai atribut nama
        System.out.println("Merek         : " + merek); // print nilai atribut merek
        System.out.println("Tahun Produksi: " + tahunProduksi); // print nilai atribut tahun produksi
    }

    public void mainkan() // prosedur untuk mensimulasikan instrumen yang sedang dimainkan
    {
        System.out.println(nama + " (" + merek + ") sedang dimainkan."); // print pesan instrumen dimainkan
    }
} // penutup class Instrumen