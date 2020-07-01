<div class="block-quick-info-2">
    <div class="container">
        <div class="block-quick-info-2-inner shadow">
            <div class="row">
                <div class="  col-4 mb-2 border-right border-dark">
                    <h5 class="text-dark ml-2 text-center mt-1 pt-1">
                        <?php echo $data['judul']; ?>
                    </h5>
                    <div class="card  ">
                        <table class="table table-bordered table-striped">
                            <?php foreach ($data['form'] as $isi): ?>
                            <tr>
                                <td>
                                    <?php echo $isi['label']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <?php echo "xxx"; ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>
                <div class="col-8">
                    <div class="alert alert-warning" role="alert">
                        Booking masih dipending, silahkan upload bukit pembayaran
                    </div>
                    <div class="alert alert-secondary text-right" role="alert">
                        <a href="" class="btn btn-sm btn-outline-success">Valid</a>
                        <a href="" class="btn btn-sm btn-outline-warning">Tidak Valid</a>
                        <a href="" class="btn btn-sm btn-outline-danger">Batalkan</a>
                    </div>
                    <div class="row">
                    <div class="col-6 border-right border-dark">
                        <div class="card card-body">
                            <div class="row">
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Nama Pengirim</label>
                                    <input type="text" class="form-control" required="" name="input[]">
                                </div>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">No Rekening</label>
                                    <input type="text" class="form-control" required="" name="input[]">
                                </div>
                                <div class="form-grup col-12 mb-2 input-group-sm">
                                    <label class="form-control-label">Gambar</label>
                                    <input type="file" class="form-control" required="" name="input[]">
                                </div>
                                <div class="modal-footer mt-4 d-flex justify-content-center col-12  py-1">
                                    <input type="hidden" name="table" value="perawatan">
                                    <button type="submit" name="aksi" value="insert" class="btn btn-sm  btn-pink2">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border-left border-dark">
                       <img src="mine/logo.png" class="img-fluid rounded" alt="Responsive image">

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>