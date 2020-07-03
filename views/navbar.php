<nav class="d-flex justify-content-between navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <span>
    <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-grip-lines"></i></button>
    <span>Periode Tahun <?php echo $Session['tahun']; ?></span>

    </span>
    <span>Selamat Datang, Admin <?php if ($Session['admin']->jenis == 'Kelurahan'): ?> <strong><?php echo $Session['admin']->kelurahan; ?></strong> <?php endif;?> </span>
</nav>
