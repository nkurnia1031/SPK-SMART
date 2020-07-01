<?php use app\Fungsi as Fungsi;?>

<div class="col-lg-12 col-12">
    <div class="card" style="zoom:85%">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="form-grup col-lg-12 mb-3 ">
                        <label class="form-control-label">Pilih Set Laporan</label>
                        <div class="input-group mb-3 d-flex">
                            <span class="mx-2"><input required="" value="bulanan" type="radio" name="jenis"> Bulanan</span>
                            <span class="mx-2"><input required="" value="tahuanan" type="radio" name="jenis"> Tahunan</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="tgl[]">
                                   <option>Minggu ke-1</option>
                                   <option>Minggu ke-2</option>
                                   <option>Minggu ke-3</option>
                                   <option>Minggu ke-4</option>
                                </select>
                            </div>
                            <div class="input-group-prepend">
                                <select class="custom-select" name="tgl[]">
                                    <?php foreach (Fungsi::$bulan as $b => $e): ?>
                                    <option value="<?php echo $b; ?>">
                                        <?php echo $e; ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <input autocomplete="off" type="number" value="2020" min="1970" required="" class="form-control form-control-line" name="tgl[]">
                            <div class="input-group-append">
                                <input type="hidden" name="hal" value="<?php echo $_REQUEST['hal']; ?>">
                                <button type="submit" class="btn btn-pink2 float-right">Set</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>