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
                                                <option <?php if ($data['form.bantuan']['tipe'] == 'Primary'): ?> selected <?php endif;?> value="Primary">Primary</option>
                                                <option <?php if ($data['form.bantuan']['tipe'] == 'Secondary'): ?> selected <?php endif;?> value="Secondary">Secondary</option>
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
            </div>
        </div>
    </div>
</div>