<?php
// Define the Elektronik class
class Elektronik {
    // Private attributes 
    private $id, $nama, $merek, $deskripsi, $harga, $foto;

    // Constructor
    public function __construct($id="", $nama="", $merek="", $deskripsi="", $harga="") {
        $this->id = $id;
        $this->nama = $nama;
        $this->merek = $merek;
        $this->deskripsi = $deskripsi;
        $this->harga = $harga;
        $this->foto = $foto;
    }

    // Getter and setter for id
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    // Getter and setter for nama
    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    // Getter and setter for merek
    public function getMerek() { return $this->merek; }
    public function setMerek($merek) { $this->merek = $merek; }

    // Getter and setter for deskripsi
    public function getDeskripsi() { return $this->deskripsi; }
    public function setDeskripsi($deskripsi) { $this->deskripsi = $deskripsi; }

    // Getter and setter for harga
    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = $harga; }
}