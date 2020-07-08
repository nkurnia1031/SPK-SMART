<div class="row " style="zoom:85%">
    <div class="col-lg-12 col-12 mt-3 mb-5">
        <div class="card" style="zoom:85%">
            <div class="card-header card-header-primary">
                <div class="d-flex  justify-content-between">
                    <h4 class="card-title ">Preview Laporan</h4>
                    <button type="button" class="btn btn-outline-dark btn-sm  " onclick="$('#print22').print();">Cetak</button>
                </div>
            </div>
            <div class="" style="zoom:100%" id="print22">
                <?php include $komponen . '/Kop.php';?>
                <div class="row ">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <br>
                        <h4 class="text-center"><b><u>Laporan Penerima Bantuan Tahun
                                    <?php echo $Session['tahun']; ?></u></b></h4>
                        <table width="100%" class="text-wrap mb-0  table  table-bordered table-striped table-hover ">
                            <thead class="">
                                <tr>
                                    <th class="w-1">No</th>
                                    <th class="w-1">NIK</th>
                                    <th class="w-1">Nama</th>
                                    <th class="w-1">Alamat</th>
                                    <?php if ($Session['admin']->jenis == 'Dinsos'): ?>
                                    <th class="w-1">Kecamatan</th>
                                    <th class="w-1">Kelurahan</th>
                                    <?php endif;?>
                                    <th class="w-1">Total Nilai</th>
                                    <th class="w-1">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['proses']->sortByDesc('total')->values() as $v => $k): ?>
                                <tr>
                                    <td class="w-1">
                                        <?php echo $v + 1; ?>
                                    </td>
                                    <td class="w-1">
                                        <?php echo $k->nik; ?>
                                    </td>
                                    <td class="w-1">
                                        <?php echo $k->nama; ?>
                                    </td>
                                    <td class="w-1">
                                        <?php echo $k->alamat; ?>
                                    </td>
                                    <?php if ($Session['admin']->jenis == 'Dinsos'): ?>
                                    <td class="w-1">
                                        <?php echo $k->kecamatan; ?>
                                    </td>
                                    <td class="w-1">
                                        <?php echo $k->kelurahan; ?>
                                    </td>
                                    <?php endif;?>
                                    <td class="w-1"><strong>
                                            <?php echo $k->total; ?></strong></td>
                                    <td class="w-1">
                                        <strong><?php echo $k->hasil; ?></strong>
                                        <div><strong>Rp.<?php echo number_format($k->uang); ?></strong></div>

                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php if ($Session['admin']->jenis == 'Dinsos'): ?>
                                    	<th colspan="5"> </th>
                                    <th colspan="3">

                                    	<?php else: ?>
                                    	<th colspan="4"> </th>
                                    <th colspan="2">


                                    <?php endif;?>
                                    	<table style="zoom:110%" class="table table-bordered">
                                    		<tr>
                                    			<td>Alternatif</td>
                                    			<td>:</td>
                                    			<td><?php echo $data['proses']->count(); ?></td>
                                    		</tr>
                                    		<tr>
                                    			<th>Layak</th>
                                    			<th>:</th>
                                    			<th><?php echo $data['proses']->where('hasil', 'Layak')->count(); ?></th>
                                    		</tr>
                                    		<tr>
                                    			<th>Tidak Layak</th>
                                    			<th>:</th>
                                    			<th><?php echo $data['proses']->where('hasil', 'Tidak Layak')->count(); ?></th>
                                    		</tr>
                                    		<tr>
                                    			<td>Bantuan yang Diberikan</td>
                                    			<td>:</td>
                                    			<td>Rp.<?php echo number_format($data['proses']->sum('uang')); ?></td>
                                    		</tr>
                                    	</table>
                                    </th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
                <?php //include $komponen . '/Ttd.php';;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;?>
            </div>
        </div>
    </div>
</div>