<?php
session_start();

require_once "vendor/autoload.php";
require_once "Crud.php";
$Crud = Crud::idupin()->mysqli2;
$Request = json_decode(json_encode($_REQUEST));
$aksi = $Request->aksi;
$link = $_SERVER['HTTP_REFERER'];
$pesan = 'Berhasil';
if (isset($Request->link)) {
    $link = $Request->link;
}
if (isset($Request->pesan)) {
    $pesan = $Request->pesan;
}

$aksi($Request, $Crud, $link, $pesan);
function insert($Request, $Crud, $link, $pesan)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    $Session = $_SESSION;

    if ($table == 'keluarga') {
        $cek = collect($Crud->table('keluarga')->select()->where('nik', $input[0])->where('tahun', $Session['tahun'])->get());
        if ($cek->isNotEmpty()) {
            $pesan = "Keluarga dengan NIK yang di input kan sudah ada, silahkan cek kembali data yg di input";
            $link = $_SERVER['HTTP_REFERER'];

            echo "<script>alert('$pesan')</script>";
            echo "<script>location.href='$link'</script>";
            die();
        }
        $Request->tanggungan = collect($Request->tanggungan)->where('jum', '>', 0)->map(function ($item, $key) {
            $items = json_decode($item->detail);
            $items->jum = $item->jum;
            return $items;
        });
        $Request->kriteria = collect($Request->kriteria)->map(function ($item, $key) {
            $item = json_decode($item);
            return $item;
        });
        array_push($input, json_encode($Request->tanggungan));
        array_push($tb, "tanggungan");
        array_push($input, json_encode($Request->kriteria));
        array_push($tb, "kriteria");

    }
    if (isset($_FILES['input'])) {
        if ($_FILES['input']['size'][0] > 0) {
            $upload = Fungsi::upload($_FILES['input']);
            if ($upload->status) {
                array_push($input, $upload->nama);
                array_push($tb, "gambar");
            } else {
                $pesan = $upload->error;
                echo "<script>alert('$pesan')</script>";
                echo "<script>location.href='$link'</script>";
                die();
            }

        }
    }

    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    $Crud->table($table)->insert($ar)->execute();
}
function update($Request, $Crud, $link, $pesan)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    if (isset($_FILES['input'])) {
        if ($_FILES['input']['size'][0] > 0) {
            $upload = Fungsi::upload($_FILES['input']);
            if ($upload->status) {
                array_push($input, $upload->nama);
                array_push($tb, "gambar");
            } else {
                $pesan = $upload->error;
                echo "<script>alert('$pesan')</script>";
                echo "<script>location.href='$link'</script>";
                die();
            }

        }
    }
    if ($table == 'keluarga') {

        $Request->tanggungan = collect($Request->tanggungan)->where('jum', '>', 0)->map(function ($item, $key) {
            $items = json_decode($item->detail);
            $items->jum = $item->jum;
            return $items;
        });
        $Request->kriteria = collect($Request->kriteria)->map(function ($item, $key) {
            $item = json_decode($item);
            return $item;
        });
        array_push($input, json_encode($Request->tanggungan));
        array_push($tb, "tanggungan");
        array_push($input, json_encode($Request->kriteria));
        array_push($tb, "kriteria");

    }

    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    if (is_array($Request->primary)) {
        $t = $Crud->table($table)->update($ar);
        foreach ($Request->primary as $v => $k) {
            $t = $t->where($Request->primary[$v], $Request->key[$v]);
        }
        $t = $t->execute();
    } else {
        $Crud->table($table)->update($ar)->where($Request->primary, $Request->key)->execute();
    }
    if ($table == 'user') {

        $_SESSION['admin'] = $Crud->table('user')->select()->where('iduser', $Request->key)->get()[0];
    }
}
function delete($Request, $Crud, $link, $pesan)
{
    $table = $Request->table;
    if (is_array($Request->primary)) {
        $t = $Crud->table($table)->delete();
        foreach ($Request->primary as $v => $k) {
            $t = $t->where($Request->primary[$v], $Request->key[$v]);
        }
        $t = $t->execute();
    } else {

        $Crud->table($table)->delete()->where($Request->primary, $Request->key)->execute();
    }

}
echo "<script>alert('$pesan')</script>";

echo "<script>location.href='$link'</script>";
