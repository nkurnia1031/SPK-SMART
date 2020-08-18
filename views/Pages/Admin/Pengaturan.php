<div class="row">
    <div class="col-12 mb-5">
        <div class="list-group accordion" id="accordionExample">
            <a href="#kriteria-subkriteria" data-toggle="collapse" class="list-group-item list-group-item-action">1. Kriteria & SubKriteria</a>
            <div class="row show collapse mt-3 px-2" id="kriteria-subkriteria" data-parent="#accordionExample">
                <div class="  col-5 mb-5">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Kriteria</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>Kriteria</th>
                                        <th>Bobot</th>
                                        <th data-priority="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['data.kriteria'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->kriteria; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->bobot; ?>
                                        </td>
                                        <td class="text-right ">
                                            <a href="?idkriteria=<?php echo $k->idkriteria; ?>" class="btn btn-warning btn-sm">Kelola</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>
                                            <?php echo $data['data.kriteria']->sum('bobot'); ?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text" value="<?php echo $data['form.kriteria']['kriteria']; ?>" required="" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="kriteria">
                                        </td>
                                        <td>
                                            <input type="number" step="any" value="<?php echo $data['form.kriteria']['bobot']; ?>" required="" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="bobot">
                                        </td>
                                        <td>
                                            <input type="hidden" name="table" value="kriteria">
                                            <?php if (!isset($Request->idkriteria)): ?>
                                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-primary">Tambah</button>
                                            <?php else: ?>
                                            <input type="hidden" name="key" value="<?php echo $Request->idkriteria; ?>">
                                            <input type="hidden" name="primary" value="idkriteria">
                                            <input type="hidden" name="link" value="<?php echo $hal; ?>">
                                            <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>
                                            <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-danger">Hapus</button>
                                            <a href="Pengaturan" class="btn btn-sm  btn-warning">Kembali</a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <?php if (isset($Request->idkriteria)): ?>
                <div class="  col-7 mb-5">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel SubKriteria [
                                <?php echo $data['form.kriteria']['kriteria']; ?> ]</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>SubKriteria</th>
                                        <th>Nilai Bobot</th>
                                        <th data-priority="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['data.subkriteria'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->subkriteria; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->nilai; ?>
                                        </td>
                                        <td class="text-right ">
                                            <a href="?idsubkriteria=<?php echo $k->idsubkriteria; ?>&idkriteria=<?php echo $k->idkriteria; ?>" class="btn btn-warning btn-sm">Kelola</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text" value="<?php echo $data['form.subkriteria']['subkriteria']; ?>" required="" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="subkriteria">
                                        </td>
                                        <td>
                                            <input type="number" value="<?php echo $data['form.subkriteria']['nilai']; ?>" required="" min="1" max="100" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="nilai">
                                        </td>
                                        <td>
                                            <input type="hidden" name="table" value="subkriteria">
                                            <input type="hidden" name="input[]" value="<?php echo $Request->idkriteria; ?>">
                                            <input type="hidden" name="tb[]" value="idkriteria">
                                            <?php if (!isset($Request->idsubkriteria)): ?>
                                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-primary">Tambah</button>
                                            <?php else: ?>
                                            <input type="hidden" name="key" value="<?php echo $Request->idsubkriteria; ?>">
                                            <input type="hidden" name="primary" value="idsubkriteria">
                                            <input type="hidden" name="link" value="Pengaturan?idkriteria=<?php echo $Request->idkriteria; ?>">
                                            <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>
                                            <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-danger">Hapus</button>
                                            <a href="Pengaturan?idkriteria=<?php echo $Request->idkriteria; ?>" class="btn btn-sm  btn-warning">Kembali</a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <?php endif;?>
            </div>
            <a href="#nominal-bantuan" data-toggle="collapse" class="list-group-item list-group-item-action">2. Nominal Bantuan & 3. Skor Minimum Penerima bantuan</a>
            <div class="row show collapse mt-3 px-2" id="nominal-bantuan" data-parent="#accordionExample">
                <div class="  col-7 mb-5 border-primary border-right">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Nominal Bantuan</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">#</th>
                                        <th>Komponen</th>
                                        <th>Uang</th>
                                        <th>Tipe</th>
                                        <th data-priority="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['data.bantuan'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->komponen; ?>
                                        </td>
                                        <td>
                                            Rp.
                                            <?php echo number_format($k->uang); ?>
                                        </td>
                                        <td>
                                            <?php echo $k->tipe; ?>
                                        </td>
                                        <td class="text-right ">
                                            <a href="?idbantuan=<?php echo $k->idbantuan; ?>" class="btn btn-warning btn-sm">Kelola</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text" value="<?php echo $data['form.bantuan']['komponen']; ?>" required="" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="komponen">
                                        </td>
                                        <td>
                                            <input type="number" value="<?php echo $data['form.bantuan']['uang']; ?>" required="" min="1" class="form-control" name="input[]">
                                            <input type="hidden" name="tb[]" value="uang">
                                        </td>
                                        <td>
                                            <select class="form-control" name="input[]">
                                                <option <?php if ($data['form.bantuan']['tipe'] == 'Primary'): ?> selected
                                                    <?php endif;?> value="Primary">Primary</option>
                                                <option <?php if ($data['form.bantuan']['tipe'] == 'Secondary'): ?> selected
                                                    <?php endif;?> value="Secondary">Secondary</option>
                                            </select>
                                            <input type="hidden" name="tb[]" value="tipe">
                                        </td>
                                        <td>
                                            <input type="hidden" name="table" value="bantuan">
                                            <?php if (!isset($Request->idbantuan)): ?>
                                            <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-primary">Tambah</button>
                                            <?php else: ?>
                                            <input type="hidden" name="key" value="<?php echo $Request->idbantuan; ?>">
                                            <input type="hidden" name="primary" value="idbantuan">
                                            <button type="submit" name="aksi" value="update" class="btn btn-sm  btn-info">Edit</button>
                                            <button type="submit" name="aksi" value="delete" class="btn btn-sm  btn-danger">Hapus</button>
                                            <a href="Pengaturan" class="btn btn-sm  btn-warning">Kembali</a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="  col-5 mb-5 border-primary border-left">
                    <form action="Action.php" method="post">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Set skor minimum</h4>
                            <hr>
                            <form>
                                <div class="input-group input-group-sm">
                                    <input type="number" step="any" class="form-control" value="<?php echo $data['smart']->min; ?>" name="input[]" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input type="hidden" name="tb[]" value="min">
                                    <div class="input-group-append">
                                        <input type="hidden" name="table" value="smart">
                                        <input type="hidden" name="key" value="<?php echo $data['smart']->tahun; ?>">
                                        <input type="hidden" name="primary" value="tahun">
                                        <button class="btn btn-outline-primary" type="submit" name="aksi" value="update" id="button-addon2">Set</button>
                                    </div>
                                </div>
                            </form>
                            <p>Skor minimum ini akan menjadi acuan dalam menentukan siapa yang layak menerima bantuan</p>
                        </div>
                    </form>
                </div>
 <div class="col-12">
                    <h5>Simulasi Bantuan</h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-4 mb-2">
                                <div class="card rounded shadow" style="zoom:85%">
                                    <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tanggungan Keluarga Fulan</h5>
                                    <div class=" card-body ">
                                        <table class="table table-borderless">
                                            <?php foreach ($data['bantuan']->where('tipe', 'Secondary') as $v => $k): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $k->komponen; ?>
                                                </td>
                                                <td>
                                                    <input type="number" value="0" min="0" required="" class="form-control" name="tanggungan[<?php echo $k->idbantuan; ?>][jum]">
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </table>
                                        <hr>
                                        <button class="btn btn-primary float-right">Proses</button>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($Request->tanggungan)): ?>
                            <div class="col-8">
                                <h6><strong>Keluarga Fulan:</strong></h6>
                                <table class="table table-borderless mb-3" style="width: 40%">
                                    <?php foreach ($data['bantuan']->where('tipe', 'Secondary')->where('jum', '>', 0) as $k): ?>
                                    <tr>
                                        <td class="py-1">
                                            <li></li>
                                        </td>
                                        <td class="py-1">
                                            <?php echo $k->komponen; ?>
                                        </td>
                                        <td class="py-1">:</td>
                                        <td class="py-1">
                                            <?php echo $k->jum; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                <h6><strong>Bantuan Sosial:</strong></h6>
                                <table class="table table-borderless mb-3" style="width: 60%">
                                    <?php $batas = 0;?>
                                    <?php $x = 0;?>
                                    <?php $x2 = array();?>
                                    <?php while ($batas < 4): ?>
                                    <?php $k = $data['bantuan']->where('tipe', 'Secondary')->where('jum', '>', 0)->sortbyDesc('uang')->values()[$x];?>
                                    <tr>
                                        <td class="py-1">
                                            <li></li>
                                        </td>
                                        <td class="py-1">
                                            <?php echo $k->komponen; ?>
                                        </td>
                                        <td class="py-1">:</td>
                                        <td class="py-1">
                                            <?php if ($k->jum > 1): ?>
                                            <?php if ($batas + $k->jum > 4): ?>
                                            <?php $k->jum = 4 - $batas;?>
                                            <?php endif;?>
                                            <?php endif;?>
                                            <?php echo $k->jum; ?> x Rp.
                                            <?php echo number_format($k->uang); ?> = Rp.
                                            <?php echo number_format($k->uang * $k->jum); ?>
                                            <?php $k->total = $k->uang * $k->jum;?>
                                            <?php $batas += $k->jum;?>
                                        </td>
                                    </tr>
                                    <?php array_push($x2, $k);?>
                                    <?php $x++;?>
                                    <?php if ($data['bantuan']->where('tipe', 'Secondary')->where('jum', '>', 0)->sum('jum') < 4): ?>
                                    <?php if ($data['bantuan']->where('tipe', 'Secondary')->where('jum', '>', 0)->sum('jum') == $batas): ?>
                                    <?php $batas = 5;?>
                                    <?php endif;?>
                                    <?php endif;?>
                                    <?php endwhile;?>
                                </table>
                                <table class=" table table-borderless mb-3 " align="center" style="width: 60%">
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
                                    <?php foreach ($data['bantuan']->where('tipe', 'Primary') as $k): ?>
                                    <tr>
                                        <td class="py-1">
                                            <?php echo $k->komponen; ?>
                                        </td>
                                        <td class="py-1">=</td>
                                        <td class="py-1">
                                            Rp.
                                            <?php echo number_format($k->uang); ?>
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
                            </div>
                            <?php endif;?>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>