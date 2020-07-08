<div class="bg-primary text-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Nama App </div>
    <div class="list-group list-group-flush">
        <a href="Home" class="<?php if ($data['link'] == 'Home'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Home</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
         <a href="Galeri" class="<?php if ($data['link'] == 'Galeri'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Galeri</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
        <?php if ($Session['admin']->jenis == 'Kelurahan'): ?>
        <a href="Keluarga" class="<?php if ($data['link'] == 'Keluarga'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Data Keluarga </span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
        <?php endif;?>
        <?php if ($Session['admin']->jenis == 'Dinsos'): ?>
        <a href="#pengguna" data-toggle="collapse" class="<?php if ($data['link'] == 'Dinsos' || $data['link'] == 'Kelurahan'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Pengguna</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
        <div class="list-group px-3 py-2 <?php if ($data['link'] == 'Dinsos' || $data['link'] == 'Kelurahan'): ?> show <?php endif;?> collapse" id="pengguna">
            <a href="Dinsos" class="list-group-item sub-nav py-2 list-group-item-action <?php if ($data['link'] == 'Dinsos'): ?> active <?php endif;?>">Dinsos</a>
            <a href="Kelurahan" class="list-group-item sub-nav py-2 list-group-item-action <?php if ($data['link'] == 'Kelurahan'): ?> active <?php endif;?>">Kelurahan</a>
        </div>
        <a href="Pengaturan" class="<?php if ($data['link'] == 'Pengaturan'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Pengaturan</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
         <a href="Proses" class="<?php if ($data['link'] == 'Proses'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Proses SMART</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
        <?php endif;?>
        <a href="Laporan" class="<?php if ($data['link'] == 'Laporan'): ?> active <?php endif;?> list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Laporan</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
        <a href="Logout" class=" list-group-item nav-icon list-group-item-action bg-primary text-light">
            <div class="d-flex  justify-content-between align-items-cente">
                <span>Logout</span> <span> <i class=" fa fa-angle-double-right"></i></span>
            </div>
        </a>
    </div>
</div>