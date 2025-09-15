#include <string>

using namespace std;

class Elektronik
{
private:
    string id, nama, merek, deskripsi, harga;

public:
    // Constructor without parameter
    Elektronik()
    {
        this->id = "";
        this->nama = "";
        this->merek = "";
        this->deskripsi = "";
        this->harga = "";
    }

    // Constructor with parameter
    Elektronik(string id, string nama, string merek, string deskripsi, string harga)
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

    string getHarga() { return harga; }
    void setHarga(string harga) { this->harga = harga; }

    // destructor
    ~Elektronik()
    {
    }
};