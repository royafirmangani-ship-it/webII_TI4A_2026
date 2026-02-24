<?php
class Mahasiswa { 
    public $nama = "Andi";
    public $nim = 123;
    public $jurusan = "Teknik Informatika";
    public function tampildata(){
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
    }

}
$mahasiswa = new Mahasiswa();
$mahasiswa->tampildata();
?>