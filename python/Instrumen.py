class Instrumen: # deklarasi class parent / base class paling dasar
    # constructor, dipanggil otomatis saat objek Instrumen dibuat
    def __init__(self, nama: str, merek: str, tahun_produksi: int): # definisi constructor dengan parameter
        self._nama = str(nama)              # inisialisasi atribut nama (protected, dipakai turunan) dengan konversi string
        self._merek = str(merek)            # inisialisasi atribut merek dengan konversi string
        self._tahun_produksi = int(tahun_produksi)  # inisialisasi atribut tahun produksi dengan konversi integer

    # --- Getter ---
    def getNama(self): # fungsi untuk mengambil data nama
        return self._nama # mengembalikan nilai dari atribut _nama

    def getMerek(self): # fungsi untuk mengambil data merek
        return self._merek # mengembalikan nilai dari atribut _merek

    def getTahunProduksi(self): # fungsi untuk mengambil data tahun produksi
        return self._tahun_produksi # mengembalikan nilai dari atribut _tahun_produksi

    # --- Setter ---
    def setNama(self, nama): # fungsi untuk mengubah data nama
        self._nama = nama # meng-assign nilai parameter ke atribut class

    def setMerek(self, merek): # fungsi untuk mengubah data merek
        self._merek = merek # meng-assign nilai parameter ke atribut class

    def setTahunProduksi(self, tahun_produksi): # fungsi untuk mengubah data tahun produksi
        self._tahun_produksi = tahun_produksi # meng-assign nilai parameter ke atribut class

    # --- Method ---
    def tampilkanInfo(self): # prosedur untuk menampilkan info dasar instrumen
        print("Nama          :", self.getNama()) # mencetak teks label dan memanggil getter nama
        print("Merek         :", self.getMerek()) # mencetak teks label dan memanggil getter merek
        print("Tahun Produksi:", self.getTahunProduksi()) # mencetak teks label dan memanggil getter tahun produksi

    def mainkan(self): # prosedur untuk mensimulasikan instrumen yang dimainkan
        print(f"{self._nama} ({self._merek}) sedang dimainkan.") # mencetak pesan instrumen dimainkan dengan format f-string