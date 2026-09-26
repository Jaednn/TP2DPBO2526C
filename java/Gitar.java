// class Gitar merupakan turunan dari InstrumenSenar
// Instrumen -> InstrumenSenar -> Gitar (Multilevel Inheritance)
public class Gitar extends InstrumenSenar // deklarasi pewarisan tingkat dua (multilevel) dari InstrumenSenar
{
    // atribut tambahan khusus Gitar
    private String tipeGitar; // deklarasi atribut spesifik tipe gitar
    private int jumlahFret; // deklarasi atribut spesifik jumlah fret
    private String jenisPickup; // deklarasi atribut spesifik jenis pickup

    // constructor, memanggil constructor InstrumenSenar dengan super()
    public Gitar(String nama, String merek, int tahunProduksi, // parameter turunan level 1
                 int jumlahSenar, String bahanSenar, String jenisBadan, // parameter turunan level 2
                 String tipeGitar, int jumlahFret, String jenisPickup) // parameter asli class Gitar
    {
        super(nama, merek, tahunProduksi, jumlahSenar, bahanSenar, jenisBadan); // memanggil constructor class parent (InstrumenSenar)
        this.tipeGitar = tipeGitar; // mengisi value atribut class dengan value dari parameter
        this.jumlahFret = jumlahFret; // mengisi value atribut class dengan value dari parameter
        this.jenisPickup = jenisPickup; // mengisi value atribut class dengan value dari parameter
    }

    // --- Getter ---
    public String getTipeGitar() { return tipeGitar; } // mengembalikan nilai tipe gitar
    public int getJumlahFret() { return jumlahFret; } // mengembalikan nilai jumlah fret
    public String getJenisPickup() { return jenisPickup; } // mengembalikan nilai jenis pickup

    // --- Setter ---
    public void setTipeGitar(String tipeGitar) { this.tipeGitar = tipeGitar; } // mengubah nilai tipe gitar
    public void setJumlahFret(int jumlahFret) { this.jumlahFret = jumlahFret; } // mengubah nilai jumlah fret
    public void setJenisPickup(String jenisPickup) { this.jenisPickup = jenisPickup; } // mengubah nilai jenis pickup

    // --- Method ---
    public void ubahPickup(String pickupBaru) // prosedur spesifik mengubah pickup gitar
    {
        System.out.println("Pickup " + nama + " diubah dari [" + jenisPickup + "] menjadi [" + pickupBaru + "]."); // print log perubahan pickup
        this.jenisPickup = pickupBaru; // meng-update atribut jenisPickup dengan yang baru
    }
} // penutup class Gitar