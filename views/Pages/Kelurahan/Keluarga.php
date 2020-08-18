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
                                            <?php endif;?> value='
                                            <?php echo json_encode($k2); ?>'>
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
            <table width="100%" class="text-wrap table-bordered mb-0 tb table    ">
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
                    <?php foreach ($data['keluarga']->values() as $v => $k): ?>
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
                            <?php if (is_object($k->tanggungan)): ?>
                                <h6><strong>Keluarga <?php echo $k->nama; ?>:</strong></h6>

                            <table class="table text-nowrap table-borderless mb-3" style="width: 40%">
                                <?php foreach ($k->tanggungan->where('tipe', 'Secondary')->where('jum', '>', 0) as $kz): ?>
                                <tr>
                                    <td class="py-1">
                                        <li></li>
                                    </td>
                                    <td class="py-1">
                                        <?php echo $kz->komponen; ?>
                                    </td>
                                    <td class="py-1">:</td>
                                    <td class="py-1">
                                        <?php echo $kz->jum; ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <h6><strong>Bantuan Sosial:</strong></h6>
                                <table class="table text-nowrap table-borderless mb-3" style="width: 60%">
                                    <?php $batas = 0;?>
                                    <?php $x = 0;?>
                                    <?php $x2 = array();?>
                                    <?php while ($batas < 4): ?>
                                    <?php $kzz = $k->tanggungan->where('tipe', 'Secondary')->where('jum', '>', 0)->sortbyDesc('uang')->values()[$x];?>
                                    <tr>
                                        <td class="py-1">
                                            <li></li>
                                        </td>
                                        <td class="py-1">
                                            <?php echo $kzz->komponen; ?>
                                        </td>
                                        <td class="py-1">:</td>
                                        <td class="py-1">
                                            <?php if ($kzz->jum > 1): ?>
                                            <?php if ($batas + $kzz->jum > 4): ?>
                                            <?php $kzz->jum = 4 - $batas;?>
                                            <?php endif;?>
                                            <?php endif;?>
                                            <?php echo $kzz->jum; ?> x Rp.
                                            <?php echo number_format($kzz->uang); ?> = Rp.
                                            <?php echo number_format($kzz->uang * $kzz->jum); ?>
                                            <?php $kzz->total = $kzz->uang * $kzz->jum;?>
                                            <?php $batas += $kzz->jum;?>
                                        </td>
                                    </tr>
                                    <?php array_push($x2, $kzz);?>
                                    <?php $x++;?>
                                    <?php if ($k->tanggungan->where('tipe', 'Secondary')->where('jum', '>', 0)->sum('jum') < 4): ?>
                                    <?php if ($k->tanggungan->where('tipe', 'Secondary')->where('jum', '>', 0)->sum('jum') == $batas): ?>
                                    <?php $batas = 5;?>
                                    <?php endif;?>
                                    <?php endif;?>
                                    <?php endwhile;?>
                                </table>
                                 <table class=" table text-nowrap table-borderless mb-3 " align="center" style="width: 60%">
                                    <?php $x2 = collect($x2);?>
                                    <tr>
                                        <td class="py-1">
                                            Setiap Tahun
                                        </td>
                                        <td class="py-1">=</td>
                                        <td class="py-1">
                                            Rp.
                                            <?php echo number_format($x2->sum('total')); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-1">
                                            Setiap Tahap (4x)
                                        </td>
                                        <td class="py-1">=</td>
                                        <td class="py-1">
                                            Rp.
                                            <?php echo number_format($x2->sum('total') / 4); ?>
                                        </td>
                                    </tr>
                                    <?php foreach ($data['bantuan']->where('tipe', 'Primary') as $kc): ?>
                                    <tr>
                                        <td class="py-1">
                                            <?php echo $kc->komponen; ?>
                                        </td>
                                        <td class="py-1">=</td>
                                        <td class="py-1">
                                            Rp.
                                            <?php echo number_format($kc->uang); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-0" colspan="3">(diberikan hanya pada tahap 1)</td>
                                    </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <td class="py-1">
                                            Setiap Tahap Pertama
                                        </td>
                                        <td class="py-1">=</td>
                                        <td class="py-1">
                                            <u> Rp.
                                                <?php echo number_format(($x2->sum('total') / 4) + $data['bantuan']->where('tipe', 'Primary')->sum('uang')); ?></u>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif;?>
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