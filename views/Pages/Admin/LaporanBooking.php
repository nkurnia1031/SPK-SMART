<div class="block-quick-info-2">
    <div class="container">
        <div class="block-quick-info-2-inner shadow">
            <div class="row">
                <?php include $komponen . "/Filter.php";?>
                <div class="col-lg-12 col-12 mt-3">
                    <div class="" style="zoom:85%">
                        <div class="card-header card-header-primary">
                            <div class="d-flex  justify-content-between">
                                <h4 class="card-title ">Preview Laporan</h4>
                                <button type="button" class="btn btn-outline-dark btn-sm  " onclick="$('#print22').print();">Catak</button>
                            </div>
                        </div>
                        <div class="" style="zoom:100%" id="print22">
                            <?php //include $komponen . '/Kop.php';;;;;?>
                            <div class="row ">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <br>
                                    <h4 class="text-center"><b><u>Laporan Perawatan</u></b></h4>
                                    <table width="100%" style="border: 2px " class=" text-wrap mb-0  table  table-bordered ">
                                        <thead class=" ">

                                            <tr>
                                                <th>No</th>
                                                <th>ID Perawatan</th>
                                                <th>ID Pelanggan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tanggal Booking</th>
                                                <th>Nama Paket Perawatan</th>
                                                <th>Harga Perawatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>xxx</td>
                                                <td>xxx</td>
                                                <td>xxx</td>
                                                <td>Rp.xxx</td>
                                                <td>10</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                            <?php include $komponen . '/Ttd.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>