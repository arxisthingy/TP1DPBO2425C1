public class Elektronik {
    private String id;
    private String nama;
    private String merek;
    private String deskripsi;
    private String harga;

    // Default Constructor
    public Elektronik() {
    }

    // Constructor with parameters 
    public Elektronik(String id, String nama, String merek, String deskripsi, String harga) {
        this.id = id;
        this.nama = nama;
        this.merek = merek;
        this.deskripsi = deskripsi;
        this.harga = harga;
    }

    // Getter for id
    public String getId(){
        return id;
    }

    // Setter for id
    public void setId(String id){
        this.id = id;
    }

    // Getter and Setter for nama
    public String getNama() {
        return nama;
    }
    public void setNama(String nama) {
        this.nama = nama;
    }

    // Getter and Setter for merek
    public String getMerek() {
        return merek;
    }
    public void setMerek(String merek) {
        this.merek = merek;
    }

    // Getter and Setter for deskripsi
    public String getDeskripsi() {
        return deskripsi;
    }
    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    // Getter and Setter for harga
    public String getHarga() {
        return harga;
    }
    public void setHarga(String harga) {
        this.harga = harga;
    }
}