<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVIIEW 1</title>
    
</head>
<body>

<div class="container">
    <h2>Masukkan Data</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" placeholder="Masukkan Data" required>
        </div>
        
        <div class="form-group">
            <label>Harga Satuan (Rp)</label>
            <input type="number" name="harga_satuan" placeholder="0" required>
        </div>

        <div class="form-group">
            <label>Jumlah (Qty)</label>
            <input type="number" name="qty" min="1" value="1" required>
        </div>
        
        <button type="submit" name="hitung">Proses Transaksi</button>
    </form>

    <?php
    function hitungSubtotal($harga, $jumlah) {
        return $harga * $jumlah;
    }

    if (isset($_POST['hitung'])) {
        $nama    = htmlspecialchars($_POST['nama_barang']);
        $harga   = (float)$_POST['harga_satuan'];
        $qty     = (int)$_POST['qty'];

        $subtotal = hitungSubtotal($harga, $qty);
        $nominal_ppn = $subtotal * 0.11;
        $total_bayar = $subtotal + $nominal_ppn;
        echo "<div class='result'>";
        echo "<div class='row'><span>Barang:</span> <span>$nama</span></div>";
        echo "<div class='row'><span>Subtotal:</span> <span>Rp " . number_format($subtotal, 0, ',', '.') . "</span></div>";
        echo "<div class='row'><span>PPN (11%):</span> <span>Rp " . number_format($nominal_ppn, 0, ',', '.') . "</span></div>";
        echo "<div class='row total'><span>TOTAL:</span> <span>Rp " . number_format($total_bayar, 0, ',', '.') . "</span></div>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>