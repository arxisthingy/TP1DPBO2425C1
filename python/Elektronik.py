class Elektronik:
    # Constructor
    def __init__(self, id="", nama="", merek="", deskripsi="", harga=""):
        self.id = id
        self.nama = nama
        self.merek = merek
        self.deskripsi = deskripsi
        self.harga = harga

    # Getter and setter for id
    def get_id(self):
        return self.id

    def set_id(self, id):
        self.id = id

    # Getter and setter for nama
    def get_nama(self): 
        return self.nama
    
    def set_nama(self, nama):
        self.nama = nama

    # Getter and setter for merek
    def get_merek(self):
        return self.merek
    
    def set_merek(self, merek):
        self.merek = merek

    # Getter and setter for deskripsi
    def get_deskripsi(self):    
        return self.deskripsi
    
    def set_deskripsi(self, deskripsi):
        self.deskripsi = deskripsi

    # Getter and setter for harga
    def get_harga(self):
        return self.harga
    
    def set_harga(self, harga):
        self.harga = harga
