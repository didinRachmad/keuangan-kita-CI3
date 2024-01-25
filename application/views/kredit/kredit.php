<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?= base_url()  ?>keuangan/tambah_kredit" class="btn btn-primary mt-1 mb-3">
                            Tambah Kredit
                        </a>
                    </div>
                    <div class="col-md-8">
                        <form action="<?= base_url() ?>keuangan/cariKredit" method="POST">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <?php
                                        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        if ($this->session->userdata('bulanBeli')) {
                                            $bln = $this->session->userdata('bulanBeli') - 1;
                                            $temp = $this->session->userdata('bulanBeli');
                                        } else {
                                            $bln = date('n') - 1;
                                            $temp = date('n');
                                        }

                                        $nilai = count($bulan);
                                        for ($i = 0; $i < $nilai; $i += 1) {
                                            $j = $i + 1;
                                            if ($bulan[$i] == $bulan[$bln]) {
                                                echo "<option value='$j' selected> $bulan[$i] </option>";
                                            } else {
                                                echo "<option value='$j'> $bulan[$i] </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="tahun" name="tahun" title="Pilih Tahun">
                                        <?php
                                        if ($this->session->userdata('tahunBeli')) {
                                            $j = $this->session->userdata('tahunBeli');
                                        } else {
                                            $j = date('Y');
                                        }
                                        for ($i = date('Y') - 1; $i <= date('Y') + 5; $i++) {
                                            if ($i == $j) {
                                                echo "<option value='$i' selected> $i </option>";
                                            } else {
                                                echo "<option value='$i'> $i </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mt-1">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-light table-striped shadow-sm bg-light" id="tabel-keuangan" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Keterangan </th>
                            <th scope="col" width="15%" class="text-center">Tanggal Transaksi</th>
                            <th scope="col" width="15%" class="text-center">Total Transaksi (Rp) </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kredit as $db) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $db['keterangan']; ?></td>
                                <td class="text-center"><?= date('d-m-Y', strtotime($db['tanggal_transaksi'])); ?></td>
                                <td class="text-center fw-bolder"><?= number_format($db['total_transaksi'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center fw-bold">
                            <td colspan="2" class="text-center">Total:</td>
                            <td class="text-center"></td>
                        </tr>
                    </tfoot>
                </table>
                <a class="btn btn-primary btn-lg text-light fw-bolder" href="<?= base_url()  ?>keuangan/kreditToPdf">PDF FILE</a>
            </div>
    </section>
</div>