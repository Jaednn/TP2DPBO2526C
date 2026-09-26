from Instrumen import Instrumen  # import class parent (Instrumen) dari file terpisah

# class InstrumenSenar merupakan turunan dari Instrumen
class InstrumenSenar(Instrumen): # deklarasi class turunan pertama (child class) dari Instrumen
    def __init__(self, nama="", merek="", tahun_produksi=0, # definisi constructor dengan parameter default level parent
                 jumlah_senar=0, bahan_senar="", jenis_badan=""): # parameter default tambahan spesifik level ini
        super().__init__(nama, merek, tahun_produksi)  # memanggil constructor parent (Instrumen) menggunakan super()
        self._jumlah_senar = int(jumlah_senar) # inisialisasi atribut spesifik turunan (jumlah senar)
        self._bahan_senar = str(bahan_senar) # inisialisasi atribut spesifik turunan (bahan senar)
        self._jenis_badan = str(jenis_badan) # inisialisasi atribut spesifik turunan (jenis badan)

    # --- Getter ---
    def getJumlahSenar(self): # fungsi getter untuk jumlah senar
        return self._jumlah_senar # mengembalikan nilai atribut _jumlah_senar

    def getBahanSenar(self): # fungsi getter untuk bahan senar
        return self._bahan_senar # mengembalikan nilai atribut _bahan_senar

    def getJenisBadan(self): # fungsi getter untuk jenis badan
        return self._jenis_badan # mengembalikan nilai atribut _jenis_badan

    # --- Setter ---
    def setJumlahSenar(self, jumlah_senar): # fungsi setter untuk jumlah senar
        self._jumlah_senar = jumlah_senar # mengubah nilai atribut jumlah senar dengan nilai parameter

    def setBahanSenar(self, bahan_senar): # fungsi setter untuk bahan senar
        self._bahan_senar = bahan_senar # mengubah nilai atribut bahan senar dengan nilai parameter

    def setJenisBadan(self, jenis_badan): # fungsi setter untuk jenis badan
        self._jenis_badan = jenis_badan # mengubah nilai atribut jenis badan dengan nilai parameter

    # --- Method ---
    def setelSenar(self): # prosedur khusus untuk menyetel dawai/senar instrumen
        print(f"{self._nama} sedang disetel {self._jumlah_senar} senarnya (bahan {self._bahan_senar}).") # mencetak aksi setel senar menggunakan f-string