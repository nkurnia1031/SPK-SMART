<div class="row ">
    <div class=" col-4 mb-5">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Input</h5>
            <form action="Action.php" method="post" enctype="multipart/form-data">
                <div class=" card-body ">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <?php foreach ($data['form'] as $isi): ?>
                                <?php if ($isi['name'] == 'kelurahan'): ?>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label text-dark">
                                        <?php echo $isi['label']; ?></label>
                                    <select  id="kelurahan" onclick="console.log($('#kecamatan').val($('#kelurahan option:selected').data('kecamatan')))" name="input[]" class="form-control">
                                        <option>-</option>
                                        <?php foreach ($data['kelurahan'] as $k): ?>
                                            <optgroup label="<?php echo $k->nama; ?>">
                                                <?php foreach ($k->kelurahan as $k2): ?>
                                                    <option data-kecamatan="<?php echo $k->nama; ?>" value="<?php echo $k2->nama; ?>"><?php echo $k2->nama; ?></option>
                                                <?php endforeach;?>

                                            </optgroup>

                                        <?php endforeach;?>
                                    </select>
                                    <input type="hidden" name="tb[]" value="kelurahan">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="table" value="pengguna">
                    <input type="hidden" name="input[]" id="kecamatan" >

                    <input type="hidden" name="tb[]" value="kecamatan">

                    <input type="hidden" name="input[]" value="Kelurahan">
                    <input type="hidden" name="tb[]" value="jenis">
                    <?php if (!isset($Request->key)): ?>
                    <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-primary">Tambah</button>
                    <?php else: ?>
                    <input type="hidden" name="key" value="<?php echo $Request->key; ?>">
                    <input type="hidden" name="primary" value="idpengguna">
                    <input type="hidden" name="link" value="<?php echo $hal; ?>">
                    <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>
                    <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-danger">Hapus</button>
                    <a href="Dinsos" class="btn btn-sm  btn-warning">Kembali</a>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
    <div class="  col-8 mb-5">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Data</h5>
            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <?php foreach ($data['form'] as $e): ?>
                        <?php if ($e['tb']): ?>
                        <th class="">
                            <?php echo $e['label']; ?>
                        </th>
                        <?php endif;?>
                        <?php endforeach;?>
                        <th data-priority="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['data'] as $v => $k): ?>
                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                        <?php foreach ($data['form'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php if ($b == 'harga'): ?>
                            Rp.
                            <?php echo number_format($k->$b); ?>
                            <?php else: ?>
                            <?php echo $k->$b; ?>
                            <?php endif;?>
                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <td class="text-right ">
                            <a href="?key=<?php echo $k->idpengguna; ?>" class="btn btn-warning btn-sm">Kelola</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>