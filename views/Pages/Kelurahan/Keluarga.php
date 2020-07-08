<form action="Action.php" method="post" enctype="multipart/form-data">
    <div class="row mb-2">
        <div class="col-4 mb-2">
            <div class="card rounded shadow mb-3" style="zoom:85%">
                <h5 class="text-dark ml-2 text-center mt-1 pt-1">Form Input</h5>
                <div class=" card-body ">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <?php foreach ($data['form'] as $isi): ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded shadow" style="zoom:85%">
                <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tanggungan</h5>
                <div class=" card-body ">
                    <table class="table table-borderless">
                        <?php foreach ($data['bantuan']->where('tipe', 'Secondary') as $v => $k): ?>
                        <tr>
                            <td>
                                <?php echo $k->komponen; ?>
                            </td>
                            <td>
                                <input type="number" value="<?php echo $k->val; ?>" required="" class="form-control" name="tanggungan[<?php echo $v; ?>][jum]">
                                <input type="hidden" name="tanggungan[<?php echo $v; ?>][detail]" value='<?php echo json_encode($k); ?>'>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8 d-flex flex-column">
            <div class="card rounded shadow mb-auto" style="zoom:85%">
                <h5 class="text-dark ml-2 text-center mt-1 pt-1">Kriteria</h5>
                <div class=" card-body ">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <?php foreach ($data['kriteria'] as $k): ?>
                                <div class="form-grup col-6 mb-2 input-group-sm">
                                    <label class="form-control-label text-dark">
                                        <?php echo $k->kriteria; ?></label>
                                    <select required class="form-control" name="kriteria[]">
                                        <?php foreach ($data['subkriteria']->where('idkriteria', $k->idkriteria) as $k2): ?>
                                        <option <?php if ($k->val == $k2->idsubkriteria): ?> selected
                                            <?php endif;?> value='<?php echo json_encode($k2); ?>'>
                                            <?php echo $k2->subkriteria; ?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-auto justify-content-end d-flex">
                <input type="hidden" name="table" value="keluarga">
                <input type="hidden" name="input[]" value="<?php echo $Session['tahun']; ?>">
                <input type="hidden" name="tb[]" value="tahun">
                <input type="hidden" name="input[]" value="<?php echo $Session['admin']->kecamatan; ?>">
                <input type="hidden" name="tb[]" value="kecamatan">
                <input type="hidden" name="input[]" value="<?php echo $Session['admin']->kelurahan; ?>">
                <input type="hidden" name="tb[]" value="kelurahan">
                <?php if (!isset($Request->key)): ?>
                <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-primary">Tambah</button>
                <?php else: ?>
                <input type="hidden" name="key" value="<?php echo $Request->key; ?>">
                <input type="hidden" name="primary" value="idkeluarga">
                <input type="hidden" name="link" value="Keluarga">
                <button type="submit" name="aksi" value="update" class="btn btn-sm mx-1 btn-info">Edit</button>
                <button type="submit" name="aksi" value="delete" class="btn btn-sm mx-1 btn-danger">Hapus</button>
                <a href="Keluarga" class="btn btn-sm mx-1 btn-warning">Kembali</a>
                <?php endif;?>
            </div>
        </div>
        <div class="col-12">
            <hr>
        </div>
    </div>
</form>
<div class="row mb-5">
    <div class="col-12">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Data</h5>
            <table width="100%" class="text-wrap mb-0 tb table  table-striped  ">
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
                        <th>Tanggungan</th>
                        <th>Kriteria</th>
                        <th data-priority="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['keluarga'] as $v => $k): ?>
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
                        <td>
                            <ul>
                                <?php if (is_object($k->tanggungan)): ?>
                                <?php foreach ($k->tanggungan as $kx): ?>
                                <li>
                                    <?php echo $kx->komponen; ?> =>
                                    <?php echo $kx->jum; ?>
                                </li>
                                <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if (is_array($k->kriteria)): ?>
                                <?php $k->kriteria = collect($k->kriteria);?>
                                <?php foreach ($k->kriteria->split(2) as $kx): ?>
                                <table class="table table-bordered">
                                    <?php foreach ($kx as $ks): ?>
                                    <tr>
                                        <td>
                                            <?php echo $ks->kriteria; ?>
                                        </td>
                                        <td>:</td>
                                        <td colspan=" ">
                                            <?php echo $ks->subkriteria; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                <?php endforeach;?>
                                <?php endif;?>
                            </div>
                        </td>
                        <td class="text-right ">
                            <a href="?key=<?php echo $k->idkeluarga; ?>" class="btn btn-warning btn-sm">Kelola</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>