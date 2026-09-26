from InstrumenSenar import InstrumenSenar  # import class parent (turunan ke-2)

# class Gitar merupakan turunan dari InstrumenSenar
# Instrumen -> InstrumenSenar -> Gitar (Multilevel Inheritance)
class Gitar(InstrumenSenar): # deklarasi class turunan kedua (membentuk multilevel inheritance)
    def __init__(self, nama="", merek="", tahun_produksi=0, # parameter turunan level 1
                 jumlah_senar=0, bahan_senar="", jenis_badan="", # parameter turunan level 2
                 tipe_gitar="", jumlah_fret=0, jenis_pickup=""): # parameter asli/spesifik class Gitar
        super().__init__(nama, merek, tahun_produksi, jumlah_senar, bahan_senar, jenis_badan) # melimpahkan pembuatan data ke constructor parent (InstrumenSenar)
        self._tipe_gitar = str(tipe_gitar) # inisialisasi atribut tipe gitar
        self._jumlah_fret = int(jumlah_fret) # inisialisasi atribut jumlah fret
        self._jenis_pickup = str(jenis_pickup) # inisialisasi atribut jenis pickup

    # --- Getter ---
    def getTipeGitar(self): # fungsi getter untuk tipe gitar
        return self._tipe_gitar # mengembalikan nilai _tipe_gitar

    def getJumlahFret(self): # fungsi getter untuk jumlah fret
        return self._jumlah_fret # mengembalikan nilai _jumlah_fret

    def getJenisPickup(self): # fungsi getter untuk jenis pickup
        return self._jenis_pickup # mengembalikan nilai _jenis_pickup

    # --- Setter ---
    def setTipeGitar(self, tipe_gitar): # fungsi setter tipe gitar
        self._tipe_gitar = tipe_gitar # mengupdate nilai atribut _tipe_gitar

    def setJumlahFret(self, jumlah_fret): # fungsi setter jumlah fret
        self._jumlah_fret = jumlah_fret # mengupdate nilai atribut _jumlah_fret

    def setJenisPickup(self, jenis_pickup): # fungsi setter jenis pickup
        self._jenis_pickup = jenis_pickup # mengupdate nilai atribut _jenis_pickup

    # --- Method ---
    def ubahPickup(self, pickup_baru): # prosedur khusus gitar untuk mengubah perangkat pickup
        print(f"Pickup {self._nama} diubah dari [{self._jenis_pickup}] menjadi [{pickup_baru}].") # cetak log perubahan pickup
        self._jenis_pickup = pickup_baru # ubah state/nilai variabel pickup dengan nilai pickup yang baru