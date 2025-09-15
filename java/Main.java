import java.util.ArrayList;
import java.util.Scanner;

// main Class 
class Main {

    public static void main(String[] args) {
        // Scanner for reading input from user
        Scanner scanner = new Scanner(System.in);

        // Creates array for storing objects
        ArrayList<Elektronik> listToko = new ArrayList<Elektronik>();

        // Add sample data
        listToko.add(new Elektronik("1", "Laptop", "Toshiba", "Laptop Toshiba Core i5", "7000000"));
        listToko.add(new Elektronik("2", "Smartphone", "Samsung", "Samsung Galaxy S21", "12000000"));
        listToko.add(new Elektronik("3", "TV", "LG", "Smart TV 42 inch", "5000000"));

        String input;

        do {
            // Show the available menu
            System.out.println("-----------MENU-----------");
            System.out.println("1. Tampilkan semau elektronik");
            System.out.println("2. Tambahkan elektronik baru");
            System.out.println("3. Edit elektronik");
            System.out.println("4. Hapus elektronik");
            System.out.println("5. Cari elektronik berdasarkan nama");
            System.out.println("6. Keluar dari program");
            System.out.print("Masukkan input >> ");
            input = scanner.next();

            // Switch case according to user's input
            switch (input) {
                case "1":
                    // Show all available data
                    System.out.println("\nDaftar Produk Elektronik:");
                    for (Elektronik e : listToko) {
                        System.out.println(e.getId() + " " + e.getNama() + " " + e.getMerek() + " " + e.getDeskripsi() + " " + e.getHarga());
                    }
                    break;
                case "2":
                    // Adds new data to the list
                    scanner.nextLine(); // consume newline
                    String id = String.valueOf(listToko.size() + 1); // Auto-generate ID
                    System.out.println("ID otomatis: " + id);
                    System.out.print("Nama: ");
                    String nama = scanner.nextLine();
                    System.out.print("Merek: ");
                    String merek = scanner.nextLine();
                    System.out.print("Deskripsi: ");
                    String deskripsi = scanner.nextLine();
                    System.out.print("Harga: ");
                    String harga = scanner.nextLine();
                    listToko.add(new Elektronik(id, nama, merek, deskripsi, harga));
                    System.out.println("Produk berhasil ditambahkan!");
                    break;
                case "3":
                    // Change the existing data according to the given ID
                    scanner.nextLine(); // consume newline
                    System.out.print("Masukkan ID elektronik yang ingin diubah: ");
                    String editId = scanner.nextLine();
                    Elektronik editElektro = null;
                    for (Elektronik e : listToko) {
                        if (e.getId().equals(editId)) {
                            editElektro = e;
                            break;
                        }
                    }
                    if (editElektro != null) {
                        System.out.print("Nama baru: ");
                        editElektro.setNama(scanner.nextLine());
                        System.out.print("Merek baru: ");
                        editElektro.setMerek(scanner.nextLine());
                        System.out.print("Deskripsi baru: ");
                        editElektro.setDeskripsi(scanner.nextLine());
                        System.out.print("Harga baru: ");
                        editElektro.setHarga(scanner.nextLine());
                        System.out.println("Data berhasil diubah!");
                    } else {
                        System.out.println("ID tidak ditemukan.");
                    }
                    break;
                case "4":
                    // Deletes existing data according to the given ID
                    scanner.nextLine(); // consume newline
                    System.out.print("Masukkan ID elektronik yang ingin dihapus: ");
                    String removeId = scanner.nextLine();
                    boolean removed = listToko.removeIf(e -> e.getId().equals(removeId));
                    // Error handling whether ID is valid or not
                    if (removed) {
                        System.out.println("Data berhasil dihapus!");
                    } else {
                        System.out.println("ID tidak ditemukan.");
                    }
                    break;
                case "5":
                    // Finds data from name
                    scanner.nextLine(); // consume newline
                    System.out.print("Masukkan nama elektronik yang ingin dicari: ");
                    String cariNama = scanner.nextLine();
                    boolean found = false;
                    // iterates through the table
                    for (Elektronik e : listToko) {
                        if (e.getNama().equalsIgnoreCase(cariNama)) {
                            System.out.println(e.getId() + " " + e.getNama() + " " + e.getMerek() + " " + e.getDeskripsi() + " " + e.getHarga());
                            found = true;
                        }
                    }
                    // error handling if it doesn't found anything
                    if (!found) {
                        System.out.println("Data tidak ditemukan.");
                    }
                    break;
                case "6":
                    // exits the program
                    System.out.println("Keluar dari program.");
                    return;
                default:
                    // case when no input is valid
                    System.out.println("Input tidak valid.");
            }
        } while (!input.equals("6"));

        // Close scanner to prevent memory leak
        scanner.close();
    }
}
