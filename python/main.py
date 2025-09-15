from Elektronik import Elektronik

def main():
    # List to store Elektronik objects
    list_toko = [
        Elektronik("1", "Laptop", "Toshiba", "Laptop Toshiba Core i5", "7000000"),
        Elektronik("2", "Smartphone", "Samsung", "Samsung Galaxy S21", "12000000"),
        Elektronik("3", "TV", "LG", "Smart TV 42 inch", "5000000")
    ]
    
    while True:
        # Show the available menu
        print("-----------MENU-----------")
        print("1. Tampilkan semua elektronik")
        print("2. Tambahkan elektronik baru")
        print("3. Edit elektronik")
        print("4. Hapus elektronik")
        print("5. Cari elektronik berdasarkan nama")
        print("6. Keluar dari program")
        input_menu = input("Masukkan input >> ")

        if input_menu == "1":
            # Show all available data
            print("\nDaftar Produk Elektronik:")
            for e in list_toko:
                print(f"{e.get_id()} {e.get_nama()} {e.get_merek()} {e.get_deskripsi()} {e.get_harga()}")
        elif input_menu == "2":
            # Adds new data to the list
            id_auto = str(len(list_toko) + 1)
            print(f"ID otomatis: {id_auto}")
            nama = input("Nama: ")
            merek = input("Merek: ")
            deskripsi = input("Deskripsi: ")
            harga = input("Harga: ")
            list_toko.append(Elektronik(id_auto, nama, merek, deskripsi, harga))
            print("Produk berhasil ditambahkan!")
        elif input_menu == "3":
            # Change the existing data according to the given ID
            edit_id = input("Masukkan ID elektronik yang ingin diubah: ")
            edit_elektronik = None
            for e in list_toko:
                if e.get_id() == edit_id:
                    edit_elektronik = e
                    break
            if edit_elektronik:
                edit_elektronik.set_nama(input("Nama baru: "))
                edit_elektronik.set_merek(input("Merek baru: "))
                edit_elektronik.set_deskripsi(input("Deskripsi baru: "))
                edit_elektronik.set_harga(input("Harga baru: "))
                print("Data berhasil diubah!")
            else:
                print("ID tidak ditemukan.")
        elif input_menu == "4":
            # Deletes existing data according to the given ID
            remove_id = input("Masukkan ID elektronik yang ingin dihapus: ")
            removed = False
            for i, e in enumerate(list_toko):
                if e.get_id() == remove_id:
                    del list_toko[i]
                    removed = True
                    break
            # Result if ID found or not
            if removed:
                print("Data berhasil dihapus!")
            else:
                print("ID tidak ditemukan.")
        elif input_menu == "5":
            # Finds data from name
            cari_nama = input("Masukkan nama elektronik yang ingin dicari: ")
            found = False
            # iterates through the table
            for e in list_toko:
                if e.get_nama().lower() == cari_nama.lower():
                    print(f"{e.get_id()} {e.get_nama()} {e.get_merek()} {e.get_deskripsi()} {e.get_harga()}")
                    found = True
            if not found:
                print("Data tidak ditemukan.")
        elif input_menu == "6":
            # Exit from program
            print("Keluar dari program.")
            break
        else:
            # case when invalid input option
            print("Input tidak valid.")

if __name__ == "__main__":
    main()