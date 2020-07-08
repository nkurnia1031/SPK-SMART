<div class="row">
    <div class="col-md-6 col-12 mb-5">
        <?php if ($data['belum']->isNotEmpty()): ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Peringatan!!</h4>
            <p>Ada <a href="Home"><span class="badge badge-danger">
                        <?php echo $data['belum']->count(); ?></span> Kelurahan </a>yang belum selesai menginput data</p>
            <hr class="my-0 py-0">
            <p class="mb-0">Silahkan tekan tombol <a href="Proses?p=1" class="btn btn-sm btn-primary"> Proses</a> jika ingin tetap memproses data yang ada</p>
        </div>
        <?php else: ?>
        <div class="alert alert-success" role="alert">
            <p>Seluruh kelurahan telah selesai menginput data</p>
            <hr class="my-0 py-0">
            <p class="mb-0">Silahkan tekan tombol <a href="Proses?p=1" class="btn btn-sm btn-primary"> Proses</a> jika ingin tetap memproses data yang ada</p>
        </div>
        <?php endif;?>
    </div>
</div>
<?php if (!is_null($data['smart']->proses)): ?>
<div class="row">
    <div class="col-12 mb-5">
        <div class="list-group ">
            <a href="#kriteria-subkriteria" data-toggle="collapse" class="list-group-item list-group-item-action">1. Inisiasi Data</a>
            <div class="row show collapse mt-3 px-2" id="kriteria-subkriteria">
                <div class="  col-12 mb-3">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Kriteria</h5>
                            <table width="100%" class="text-wrap mb-0  table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Variabel</th>
                                        <th>Kriteria</th>
                                        <th>Nilai Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['kriteria'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            K
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <a href="#sub-<?php echo $k->idkriteria; ?>" data-toggle="collapse">
                                                <?php echo $k->kriteria; ?></a>
                                            <ul class="collapse" id="sub-<?php echo $k->idkriteria; ?>">
                                                <?php foreach ($k->subkriteria as $kxx): ?>
                                                <li>
                                                    <?php echo $kxx->subkriteria; ?> -(
                                                    <?php echo $kxx->nilai; ?>)</li>
                                                <?php endforeach;?>
                                            </ul>
                                        </td>
                                        <td>
                                            <?php echo $k->bobot; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th>
                                            <?php echo $data['kriteria']->sum('bobot'); ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="  col-12 mb-5">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Alternatif</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th rowspan="2" class="w-1">No.</th>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?php echo $data['kriteria']->count(); ?>">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($data['kriteria'] as $v => $k): ?>
                                        <th>
                                            K
                                            <?php echo $v + 1; ?>
                                        </th>
                                        <?php endforeach;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['proses'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->nama; ?>
                                        </td>
                                        <?php foreach ($data['kriteria'] as $v1 => $k1): ?>
                                        <td>
                                            <?php $r = "K" . ($v1 + 1);?>
                                            <?php echo $k->$r; ?>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <a href="#utility" data-toggle="collapse" class="list-group-item list-group-item-action">2. Nilai Utility</a>
            <div class="row  collapse mt-3 px-2" id="utility">
                <div class="  col-12 mb-5">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Utility</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th rowspan="2" class="w-1">No.</th>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?php echo $data['kriteria']->count(); ?>">Nilai Utility</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($data['kriteria'] as $v => $k): ?>
                                        <th>
                                            K
                                            <?php echo $v + 1; ?>
                                        </th>
                                        <?php endforeach;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['proses'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->nama; ?>
                                        </td>
                                        <?php foreach ($data['kriteria'] as $v1 => $k1): ?>
                                        <td>
                                            <?php $r = "NK" . ($v1 + 1);?>
                                            <?php echo $k->$r; ?>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <a href="#akhir" data-toggle="collapse" class="list-group-item list-group-item-action">3. Nilai Akhir</a>
            <div class="row  collapse mt-3 px-2" id="akhir">
                <div class="  col-12 mb-5">
                    <form action="Action.php" method="post">
                        <div class="card rounded shadow" style="zoom:85%">
                            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Nilai Akhir</h5>
                            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                                <thead class="">
                                    <tr>
                                        <th rowspan="2" class="w-1">No.</th>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?php echo $data['kriteria']->count(); ?>">Nilai Akhir</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($data['kriteria'] as $v => $k): ?>
                                        <th>
                                            K
                                            <?php echo $v + 1; ?>
                                        </th>
                                        <?php endforeach;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['proses'] as $v => $k): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k->nama; ?>
                                        </td>
                                        <?php foreach ($data['kriteria'] as $v1 => $k1): ?>
                                        <td>
                                            <?php $r = "UK" . ($v1 + 1);?>
                                            <?php echo $k->$r; ?>
                                        </td>
                                        <?php endforeach;?>
                                        <td>
                                            <?php echo $k->total; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <a href="#hasil" data-toggle="collapse" class="list-group-item list-group-item-action">4. Hasil Layak atau Tidak Layak</a>
            <div class="row  collapse mt-3 mb-5 px-2" id="hasil">
                <div class="  col-12 ">
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Perhatian!!</h4>
                        <p>Berikut akan dibagi hasil dari penilaian metode SMART menjadi layak dan tidak layak</p>
                        <hr class="my-0 py-0">
                        <p class="mb-0">Setiap Alternatif dengan total nilai lebih besar atau sama dengan <span class="badge badge-danger"><strong>
                                    <?php echo $data['smart']->min; ?></strong></span> akan di nyatakan layak</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 ">
                    <div class="card rounded shadow" style="zoom:85%">
                        <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Layak</h5>
                        <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                            <thead class="">
                                <tr>
                                    <th class="w-1">No.</th>
                                    <th>Alternatif</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['proses']->where('total', '>=', $data['smart']->min)->sortByDesc('total')->values() as $v => $k): ?>
                                <tr>
                                    <td>
                                        <?php echo $v + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $k->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $k->total; ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-12 ">
                    <div class="card rounded shadow" style="zoom:85%">
                        <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tabel Tidak Layak</h5>
                        <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                            <thead class="">
                                <tr>
                                    <th class="w-1">No.</th>
                                    <th>Alternatif</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['proses']->where('total', '<', $data['smart']->min)->sortByDesc('total')->values() as $v => $k): ?>
                                <tr>
                                    <td>
                                        <?php echo $v + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $k->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $k->total; ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>