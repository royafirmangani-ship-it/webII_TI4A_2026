<?php

class PersegiPanjang {
    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }

    public function hitungKeliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

$persegi = new PersegiPanjang(10, 5);

echo "--- Perhitungan Persegi Panjang ---\n";
echo "Panjang  : " . $persegi->panjang . "\n";
echo "Lebar    : " . $persegi->lebar . "\n";
echo "-----------------------------------\n";
echo "Luas     : " . $persegi->hitungLuas() . "\n";
echo "Keliling : " . $persegi->hitungKeliling() . "\n";

?>