<div class="row ">
    <div class="col-4 mb-5">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Status Data Kelurahan</h5>
            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <th>Kelurahan</th>
                        <th data-priority="1">Status</th>
                        <?php if ($Session['admin']->jenis == 'Kelurahan'): ?>
                        <th></th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['status_kel'] as $v => $k): ?>
                    <tr>
                        <td colspan="4">
                            <strong>Kecamatan:</strong> <?php echo $v; ?>
                        </td>
                    </tr>
                    <?php foreach ($k as $va => $kx): ?>
                    <tr>
                        <td>
                            <?php echo $va + 1; ?>
                        </td>
                        <td>
                            <?php echo $kx->kelurahan; ?>
                        </td>
                        <td>
                            <?php if ($kx->status == 'Belum'): ?>
                            <span style="zoom:120%" class="badge badge-danger">
                                <?php echo $kx->status; ?>
                            </span>
                            <?php endif;?>
                            <?php if ($kx->status == 'Selesai'): ?>
                            <span style="zoom:120%" class="badge badge-success">
                                <?php echo $kx->status; ?>
                            </span>
                            <?php endif;?>
                        </td>
                        <?php if ($Session['admin']->jenis == 'Kelurahan'): ?>
                        <td>
                            <?php if ($kx->kelurahan == $Session['admin']->kelurahan): ?>
                            <a href="Action.php?table=status_kel&input[]=Selesai&tb[]=status&primary=idstatus&key=<?php echo $kx->idstatus; ?>&aksi=update" class="btn btn-sm btn-success">Selesai</a>
                            <a href="Action.php?table=status_kel&input[]=Belum&tb[]=status&primary=idstatus&key=<?php echo $kx->idstatus; ?>&aksi=update" class="btn btn-sm btn-danger">Batal</a>
                            <?php endif;?>
                        </td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>