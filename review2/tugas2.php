<?php
class User {
    
    protected $nama;
    protected $email;
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }
    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getInfo() {
        return "Nama: " . $this->nama . " | Email: " . $this->email;
    }
}


class Mahasiswa extends User {
    private $nim; 

    public function __construct($nama, $email, $nim) {
        parent::__construct($nama, $email);
        $this->nim = $nim;
    }

    public function tampilkanMahasiswa() {
        return "[Data Mahasiswa] " . $this->getInfo() . " | NIM: " . $this->nim;
    }
}

class Dosen extends User {
    private $nidn; 

    public function __construct($nama, $email, $nidn) {
        parent::__construct($nama, $email);
        $this->nidn = $nidn;
    }

    public function tampilkanDosen() {
        return "[Data Dosen] " . $this->getInfo() . " | NIDN: " . $this->nidn;
    }
}

echo "<h3>Hasil Gabungan OOP PHP</h3>";

$mhs = new Mahasiswa("Andi Pratama", "andi@kampus.id", "22010045");
echo $mhs->tampilkanMahasiswa() . "<br>";

$dsn = new Dosen("Dr. Budi Santoso", "budi@dosen.id", "19881023");
echo $dsn->tampilkanDosen() . "<hr>";
echo "<b>Update Nama Mahasiswa via Setter:</b><br>";
$mhs->setNama("Andi Wijaya Kusuma"); 
echo "Nama Baru (Getter): " . $mhs->getNama(); 

?>