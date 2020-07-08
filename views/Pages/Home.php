<div class="row ">
    <div class="col-4 mb-5">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Status Data Kelurahan</h5>
            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <th>Kelurahan</th>
                        <th data-priority="1">Status</th>
                        <?php if ($Session['admin']->jenis == 'Kelurahan'): ?>
                        <th></th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['status_kel'] as $v => $k): ?>
                    <tr>
                        <td colspan="4">
                            <strong>Kecamatan:</strong>
                            <?php echo $v; ?>
                        </td>
                    </tr>
                    <?php foreach ($k as $va => $kx): ?>
                    <tr>
                        <td>
                            <?php echo $va + 1; ?>
                        </td>
                        <td>
                            <?php echo $kx->kelurahan; ?>
                        </td>
                        <td>
                            <?php if ($kx->status == 'Belum'): ?>
                            <span style="zoom:120%" class="badge badge-danger">
                                <?php echo $kx->status; ?>
                            </span>
                            <?php endif;?>
                            <?php if ($kx->status == 'Selesai'): ?>
                            <span style="zoom:120%" class="badge badge-success">
                                <?php echo $kx->status; ?>
                            </span>
                            <?php endif;?>
                        </td>
                        <?php if ($Session['admin']->jenis == 'Kelurahan'): ?>
                        <td>
                            <?php if ($kx->kelurahan == $Session['admin']->kelurahan): ?>
                            <a href="Action.php?table=status_kel&input[]=Selesai&tb[]=status&primary=idstatus&key=<?php echo $kx->idstatus; ?>&aksi=update" class="btn btn-sm btn-success">Selesai</a>
                            <a href="Action.php?table=status_kel&input[]=Belum&tb[]=status&primary=idstatus&key=<?php echo $kx->idstatus; ?>&aksi=update" class="btn btn-sm btn-danger">Batal</a>
                            <?php endif;?>
                        </td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Tugas </h5>
            <table width="100%" class="text-wrap mb-0 tb table  table-striped table-hover ">
                <tbody>
                    <tr>
                        <td>Merumuskan kebijaksanaan dibidang sosial</td>
                    </tr>
                    <tr>
                        <td>Mengkoordinasikan dibidang sosial</td>
                    </tr>
                    <tr>
                        <td>Membina dan mengendalikan dibidang sosial</td>
                    </tr>
                    <tr>
                        <td>Melaksanakan kewenangan dibidang sosial</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Syarat</h5>
            <div class="card-body">
                <p class="text-justify">
                    Keluarga miskin dan rentan
                    yang terdaftar dalam Data
                    Terpadu Program Penanganan
                    Fakir Miskin yang memiliki
                    komponen kesehatan, pendidikan,
                    dan kesejahteraan sosial
                </p>
            </div>
        </div>
    </div>
    <div class="col-8 mb-5">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Visi </h6>
            <div class="jumbotron">
                <h1 class="text-center h2">“Terwujudnya kesejahteraan sosial
masyarakat, melembaganya
semangat kepahlawanan dan
kesetiakawanan sosial, serta
pemantapan aparatur” </h1>
            </div>
        </div>
        <div class="card rounded shadow mb-3" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Sejarah</h5>
            <div class="card-body ">
                <p class="text-justify">Dinas Sosial Kota Dumai
                    merupakan instansi yang relatif
                    baru dirintis, namun dengan
                    berjalannya waktu dan proses
                    yang terus dijalankan Dinas Sosial
                    Kota Dumai telah banyak berbuat
                    untuk mengelola lingkungan
                    masyarakat, hasil utama
                    pengembangan Dinas Sosial ini
                    nampak pada munculnya
                    kesadaran dan kepedulian
                    dikalangan masyarakat, Pada
                    tahun 2008 Dinas Sosial Kota
                    Dumai sudah berdiri sendiri yang
                    di pimpin oleh Hasan
                    Basri,S.KOM</p>
                <p class="text-justify">
                    Terbentuknya Dinas Sosial
                    Kota Dumai berdasarkan Perda
                    Nomor 16 tahun 2008 dan
                    diperbarui dengan Perda Nomor 4
                    Tahun 2011 tentang Organisasi
                    dan Tata Kerja Dinas Daerah Kota
                    Dumai dan diperbaharui lagi
                    dengan Perda Nomor 12 Tahun
                    2016 tentang Pembentukan dan
                    Susunan Perangkat Daerah Kota
                    Dumai.
                </p>
                <p class="text-justify">
                    Dinas Sosial ini berada di lokasi
                    Kecamatan Dumai Timur, Jl. S.M.
                    Amin No. 39 Jaya Mukti kota
                    Dumai, riau 28826
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card rounded shadow mb-2" style="zoom:85%">
                    <h5 class="text-dark ml-2 text-center mt-1 pt-1">Fungsi </h5>
                    <table width="100%" class="text-wrap mb-0 tb table  table-striped table-hover ">
                        <tbody>
                            <tr>
                                <td>
                                    Penyusunan perencanaan bidang sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    penyiapan perumusan
                                    kebijakan/peraturan sebagai
                                    kebijakan teknis bidang
                                    sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    penyiapan penyusunan
                                    norma, standar, prosedur
                                    dan kriteria di bidang
                                    Rehabilitasi dan
                                    Perlindungan Jaminan Sosial
                                    serta bidang Pemberdayaan
                                    Sosial dan penanganan fakir
                                    miskin
                                </td>
                            </tr>
                            <tr>
                                <td>pelaksanaan urusan
                                    pemerintahan dan pelayanan
                                    umum bidang sosial</td>
                            </tr>
                            <tr>
                                <td>
                                    penyiapan pemberian
                                    bimbingan teknis dan
                                    supervisi dibidang
                                    rehabilitasi dan perlindungan
                                    jaminan sosial,
                                    pemberdayaan sosial dan
                                    penanganan fakir miskin
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    pelaksanaan kegiatan
                                    penatausahaan Dinas Sosial
                                    penyiapan fungsi lain yang
                                    diberikan oleh Walikota
                                    sesuai dengan lingkup
                                    fungsinya.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="card rounded shadow mb-2" style="zoom:85%">
                    <h5 class="text-dark ml-2 text-center mt-1 pt-1">Misi </h5>
                    <table width="100%" class="text-wrap mb-0 tb table  table-striped table-hover ">
                        <tbody>
                            <tr>
                                <td>
                                    Meningkatkan harkat dan
                                    martabat serta kualitas hidup
                                    Penyandang Masalah
                                    Kesejahteraan sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan pelayanan dan
                                    rehabilitasi sosial bagi
                                    Penyandang masalah
                                    kesejahteraan sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan kesadaran
                                    hidup berkeluarga dan
                                    bermasyarakat yang
                                    harmonis melalui nilai
                                    kelembagaan dan
                                    penyuluhan sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mengembangkan
                                    perlindungan dan jaminan
                                    sosial bagi Penyandang
                                    masalah kesejahteraan sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan dan
                                    melestarikan nilai-nilai
                                    kepahlawanan, keperintisan,
                                    dan kesetiakawanan sosial
                                    untuk menjamin
                                    keberlanjutan peran serta
                                    masyarakat dalam
                                    penyelenggaran
                                    kesejahteraan sosial
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan mutu
                                    pelayanan sosial melalui
                                    panti
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan mutu
                                    pelayanan sosial melalui
                                    panti
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Meningkatkan kualitas
                                    pelayanan administrasi,
                                    sumber daya manusia,
                                    perencanaan serta
                                    kerjasama program bidang
                                    sosial
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>