<html><head>
  <title></title>
  <style>
    h1 {
      font-family: Arial;
      text-transform: uppercase;
      font-weight: 400;
      margin-top: 10px;
      text-align: center;
      color: black
    }

    p {
      color: black;
      font-family: Arial;
      font-weight: 400;
    }

    .total {
      text-align: right;
      margin-right: 20px;
    }

    .text {
      font-size: 16px;
    }

    .harga {
      font-size: 24px;
      margin-top: -15px;
    }

    .bulan {
      text-align: center;
      margin-top: 0px;
      font-size: 20px;
    }

    hr {
      width: 50%;
      margin-top: -10px;
    }

    #tabel {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }

    #tabel td,
    #tabel th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    #tabel th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #6777EF;
      color: white;
    }
  </style>
</head><body>
  <h1>Data Debit</h1>
  <hr size="1px">
  <p class="bulan"><?= $bulan; ?> <?= $tahun ?></p>
  <table id="tabel">
    <tr>
      <th>No</th>
      <th>Keterangan</th>
      <th>Tanggal Transaksi</th>
      <th>Total Transaksi (Rp) </th>
    </tr>
    <?php $start = 0; ?>
    <?php foreach ($laporan as $lp) : ?>
      <tr>
        <td><?= $start + 1; ?></td>
        <td><?= $lp['keterangan']; ?></td>
        <td><?= $lp['tanggal_transaksi']; ?></td>
        <td><?= number_format($lp['total_transaksi'], 0, ',', '.') ?></td>
      </tr>
      <?php $start++; ?>
    <?php endforeach; ?>
  </table>
  <div class="total">
    <p class="text">Total Debit <?= $bulan; ?> <?= $tahun ?></p>
    <p class="harga">Rp. <?= number_format($total['total_transaksi'], 0, ',', '.') ?></p>
  </div>
</body></html>