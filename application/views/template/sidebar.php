<div class="navbar-bg"></div>
<nav class="navbar main-navbar">
    <ul class="navbar-nav ps-3">
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i>
            <h5 class="mt-2 text-light d-inline ml-3"><?= $title; ?></h5>
        </a>

    </ul>
    <ul class="nav navbar-nav navbar-right pe-4">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
    </ul>
</nav>
</div>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>dashboard" class="text-primary fw-bold" style="font-size: 16px;"><i class="fas fa-book-open"></i> Keuangan Kita</a>
            <?php if (strlen($nama) > 25) : ?>
                <p class="text-primary fw-bold"><span class="badge badge-primary"> <i class="fas fa-store"></i> <?= substr($nama, 0, 23) . '..'; ?></span></p>
            <?php else : ?>
                <p class="text-primary fw-bold"><span class="badge badge-primary"> <i class="fas fa-store"></i> <?= $nama ?></span></p>
            <?php endif ?>

        </div>
        <ul class="sidebar-menu">
            <li class="menu-header mt-4">Dashboard</li>
            <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- <li class="menu-header">Produk</li>
            <li <?= $this->uri->segment(2) == 'data_produk' || $this->uri->segment(2) == 'tambah_produk' || $this->uri->segment(2) == 'update_produk' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>produk/data_produk">
                    <i class="fas fa-box-open"></i>
                    <span>Data Produk</span>
                </a>
            </li>
            <li <?= $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'tambah_kategori' || $this->uri->segment(2) == 'update_kategori' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>produk/kategori">
                    <i class="fas fa-list"></i>
                    <span>Kategori Produk</span>
                </a>
            </li> -->

            <li class="menu-header">Keuangan</li>
            <li <?= $this->uri->segment(2) == 'debit' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>keuangan/debit">
                    <i class="fas fa-arrow-alt-circle-left">
                    </i>
                    <span>Debit</span>
                </a>
            </li>
            <li <?= $this->uri->segment(2) == 'kredit' || $this->uri->segment(2) == 'tambah_kredit' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>keuangan/kredit">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    <span>Kredit</span>
                </a>
            </li>
            <li class="menu-header">Profil Usaha</li>
            <li <?= $this->uri->segment(1) == 'profil' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url() ?>profil">
                    <i class="fas fa-store"></i>
                    <span>Profil Usaha</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keuangan Kita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Keluar Dari Keuangan Kita ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="<?= base_url() ?>auth/logout">Keluar</a>
            </div>
        </div>
    </div>
</div>