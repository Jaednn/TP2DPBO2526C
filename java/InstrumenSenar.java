// class InstrumenSenar merupakan turunan dari class Instrumen
public class InstrumenSenar extends Instrumen // deklarasi pewarisan (inheritance) dari class Instrumen
{
    // atribut tambahan
    protected int jumlahSenar; // deklarasi atribut tambahan jumlah senar 
    protected String bahanSenar; // deklarasi atribut tambahan bahan senar
    protected String jenisBadan; // deklarasi atribut tambahan jenis badan instrumen

    // constructor, memanggil constructor parent (Instrumen) dengan super()
    public InstrumenSenar(String nama, String merek, int tahunProduksi, // parameter untuk base class
                           int jumlahSenar, String bahanSenar, String jenisBadan) // parameter khusus class ini
    {
        super(nama, merek, tahunProduksi); // memanggil constructor class induk (Instrumen)
        this.jumlahSenar = jumlahSenar; // mengisi value atribut class dengan value dari parameter
        this.bahanSenar = bahanSenar; // mengisi value atribut class dengan value dari parameter
        this.jenisBadan = jenisBadan; // mengisi value atribut class dengan value dari parameter
    }

    // --- Getter ---
    public int getJumlahSenar() { return jumlahSenar; } // mengembalikan nilai jumlah senar
    public String getBahanSenar() { return bahanSenar; } // mengembalikan nilai bahan senar
    public String getJenisBadan() { return jenisBadan; } // mengembalikan nilai jenis badan

    // --- Setter ---
    public void setJumlahSenar(int jumlahSenar) { this.jumlahSenar = jumlahSenar; } // mengubah nilai jumlah senar
    public void setBahanSenar(String bahanSenar) { this.bahanSenar = bahanSenar; } // mengubah nilai bahan senar
    public void setJenisBadan(String jenisBadan) { this.jenisBadan = jenisBadan; } // mengubah nilai jenis badan

    // --- Method ---
    public void setelSenar() // prosedur spesifik untuk menyetel senar
    {
        System.out.println(nama + " sedang disetel " + jumlahSenar + " senarnya (bahan " + bahanSenar + ")."); // print aksi setel senar
    }
} // penutup class InstrumenSenar