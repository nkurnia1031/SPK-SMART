<div class="row align-items-center">
    <div class="mx-auto  col-8 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <div class="card-header">
                <h5 class="text-dark ml-2 text-center mt-1 pt-1">Kelola Akun</h5>
            </div>
            <form action="Action.php" method="post" enctype="multipart/form-data">
                <div class=" card-body ">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['user.form'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control multi" name="input[]">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jk">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <?php foreach ($data['user.form2'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
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
                    <input type="hidden" name="link" value="Login">
                    <input type="hidden" name="pesan" value="Berhasil Daftar, Silahkan Login">
                    <button type="submit" name="aksi" value="update" class="btn btn-sm btn-pink2">Simpan</button>
                    <a href="Login" class="btn btn-sm btn-warning">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>