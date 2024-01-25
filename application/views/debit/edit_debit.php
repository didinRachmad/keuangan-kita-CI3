<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?= $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $edit_debit[0]['keterangan'] ?>" autocomplete="off">
                                <?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal</label>
                                <input class="form-control datepicker" id="tanggal_transaksi" name="tanggal_transaksi" autocomplete="off" value="<?= date('d-m-Y', strtotime($edit_debit[0]['tanggal_transaksi'])) ?>">
                                <?= form_error('tanggal_transaksi', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="total_transaksi">Total Pengeluaran (Rp) </label>
                                <input type="text" class="form-control uang" id="total_transaksi" name="total_transaksi" autocomplete="off" value="<?= $edit_debit[0]['total_transaksi'] ?>">
                                <?= form_error('total_transaksi', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>keuangan/debit" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>