#include <string>

using namespace std;

class Elektronik
{
private:
    string id, nama, merek, deskripsi;
    int harga; // ubah dari string ke int

public:
    // Constructor tanpa parameter
    Elektronik()
    {
        this->id = "";
        this->nama = "";
        this->merek = "";
        this->deskripsi = "";
        this->harga = 0; // default int
    }

    // Constructor dengan parameter
    Elektronik(string id, string nama, string merek, string deskripsi, int harga)
    {
        this->id = id;
        this->nama = nama;
        this->merek = merek;
        this->deskripsi = deskripsi;
        this->harga = harga;
    }

    // Getter & Setter
    string getId() { return id; }
    void setId(string id) { this->id = id; }

    string getNama() { return nama; }
    void setNama(string nama) { this->nama = nama; }

    string getMerek() { return merek; }
    void setMerek(string merek) { this->merek = merek; }

    string getDeskripsi() { return deskripsi; }
    void setDeskripsi(string deskripsi) { this->deskripsi = deskripsi; }

    int getHarga() { return harga; } // ubah ke int
    void setHarga(int harga) { this->harga = harga; } // ubah ke int

    // destructor
    ~Elektronik()
    {
    }
};