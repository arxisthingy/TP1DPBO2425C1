#include <bits/stdc++.h>
#include "Elektronik.cpp"

using namespace std;

int main() {

    // vector untuk menyimpan objek
    vector<Elektronik> listToko = {
        Elektronik("1", "Laptop", "Toshiba", "Laptop Toshiba Core i5", 7000000),
        Elektronik("2", "Smartphone", "Samsung", "Samsung Galaxy S21", 12000000),
        Elektronik("3", "TV", "LG", "Smart TV 42 inch", 5000000)
    };

    string input; // input
    do {
        // Show the available menu
        cout << "-----------MENU-----------\n";
        cout << "1. Tampilkan semua elektronik\n";
        cout << "2. Tambahkan elektronik baru\n";
        cout << "3. Edit elektronik\n";
        cout << "4. Hapus elektronik\n";
        cout << "5. Cari elektronik berdasarkan nama\n";
        cout << "6. Keluar dari program\n";
        cout << "Masukkan input >> ";
        cin >> input; // input

        if (input == "1") {
            // Shows all available data
            cout << "\nDaftar Produk Elektronik:\n";
            for (auto &e : listToko) {
                cout << e.getId() << " " << e.getNama() << " " << e.getMerek()
                     << " " << e.getDeskripsi() << " " << e.getHarga() << endl;
            }
        }
        else if (input == "2") {
            // Adds new data to the list
            cin.ignore();
            string id = to_string(listToko.size() + 1);
            string nama, merek, deskripsi;
            int harga;
            cout << "ID otomatis: " << id << endl;
            cout << "Nama: "; getline(cin, nama);
            cout << "Merek: "; getline(cin, merek);
            cout << "Deskripsi: "; getline(cin, deskripsi);
            cout << "Harga: "; cin >> harga; cin.ignore();
            listToko.push_back(Elektronik(id, nama, merek, deskripsi, harga));
            cout << "Produk berhasil ditambahkan!\n";
        }
        else if (input == "3") {
            // Change the existing data according to the given ID
            cin.ignore();
            cout << "Masukkan ID elektronik yang ingin diubah: ";
            string editId; getline(cin, editId);
            bool found = false;
            for (auto &e : listToko) {
                if (e.getId() == editId) {
                    string nama, merek, deskripsi;
                    int harga;
                    cout << "Nama baru: "; getline(cin, nama);
                    cout << "Merek baru: "; getline(cin, merek);
                    cout << "Deskripsi baru: "; getline(cin, deskripsi);
                    cout << "Harga baru: "; cin >> harga; cin.ignore();
                    e.setNama(nama);
                    e.setMerek(merek);
                    e.setDeskripsi(deskripsi);
                    e.setHarga(harga);
                    cout << "Data berhasil diubah!\n";
                    found = true;
                    break;
                }
            }
            if (!found) cout << "ID tidak ditemukan.\n";
        }
        else if (input == "4") {
            // Deletes existing data according to the given id
            cin.ignore();
            cout << "Masukkan ID elektronik yang ingin dihapus: ";
            string removeId; getline(cin, removeId);
            auto it = remove_if(listToko.begin(), listToko.end(), [&](Elektronik &e){ return e.getId() == removeId; });
            if (it != listToko.end()) {
                listToko.erase(it, listToko.end());
                cout << "Data berhasil dihapus!\n";
            } else {
                cout << "ID tidak ditemukan.\n";
            }
        }
        else if (input == "5") {
            // Finds data from input
            cin.ignore();
            cout << "Masukkan nama elektronik yang ingin dicari: ";
            string cariNama; getline(cin, cariNama);
            bool found = false;
            for (auto &e : listToko) {
                if (cariNama == e.getNama()) {
                    cout << e.getId() << " " << e.getNama() << " " << e.getMerek()
                         << " " << e.getDeskripsi() << " " << e.getHarga() << endl;
                    found = true;
                }
            }
            // case if it doesn't found anything
            if (!found) cout << "Data tidak ditemukan.\n";
        }
        else if (input == "6") {
            // exits the program
            cout << "Keluar dari program.\n";
        }
        else {
            // case when no input is valid
            cout << "Input tidak valid.\n";
        }
    } while (input != "6");

    return 0;
}