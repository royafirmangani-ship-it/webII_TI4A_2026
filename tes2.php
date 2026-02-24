<?php
// 1. Data Nilai Mahasiswa
$nilai_mahasiswa = [80, 70, 75, 60, 85];

// 2. Proses Hitung Rata-Rata
$total_nilai = array_sum($nilai_mahasiswa);
$jumlah_data = count($nilai_mahasiswa);
$rata_rata   = $total_nilai / $jumlah_data;

// 3. Menentukan Status dengan Perbandingan
$ambang_batas = 75;

if ($rata_rata > $ambang_batas) {
    $status = "<b style='color:green;'>LULUS</b> (Rata-rata $rata_rata > $ambang_batas)";
} else {
    $status = "<b style='color:red;'>TIDAK LULUS</b> (Rata-rata $rata_rata <= $ambang_batas)";
}

// 4. Output Hasil
echo "<h3>Hasil Evaluasi Nilai</h3>";
echo "Daftar Nilai: " . implode(", ", $nilai_mahasiswa) . "<br>";
echo "Rata-rata: " . $rata_rata . "<br>";
echo "Status Akhir: " . $status;

// 5. Tambahan: Pesan Perbandingan
echo "<hr>";
echo "<b>Keterangan Perbandingan:</b><br>";
echo "Jika > 75: LULUS <br>";
echo "Jika <= 75: TIDAK LULUS";
?>