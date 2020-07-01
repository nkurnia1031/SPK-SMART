<?php
require_once "vendor/autoload.php";
spl_autoload_register(function ($className) {
    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__;

    // replace namespace separator with directory separator (prolly not required)
    $className = str_replace('\\', $ds, $className);

    // get full name of file containing the required class
    $file = "{$dir}{$ds}{$className}.php";

    // get file if it is readable
    if (is_readable($file)) {
        require_once $file;
    }

});

date_default_timezone_set('Asia/Jakarta');
session_start();

$Session = $_SESSION;
$Request = json_decode(json_encode($_REQUEST));
$num = strripos($_SERVER['PHP_SELF'], 'index.php');
//dd($_SERVER['REQUEST_URI']);
$hal = substr($_SERVER['REQUEST_URI'], $num);
$hal = explode("?", $hal);
$hal = $hal[0];
if ($hal == '') {
    echo "<script>location.href = 'Home';</script>";
}
$free = ['Login', 'Logout', 'Home', 'Daftar', 'Perawatan'];
$admin = ['Dinsos', 'Kelurahan', 'Pengaturan'];
$atas = ['Login', 'Daftar', 'Data-Perawatan', 'Data-Pengguna', 'Profil'];

if (!in_array($hal, $free)) {

    if (!isset($Session['admin'])) {
        echo "<script>alert('Anda belum login, silahkan login');</script>";
        echo "<script>location.href = 'Login';</script>";
    }
}
if (in_array($hal, $admin)) {

    if ($Session['admin']->jenis != 'Dinsos') {
        $link = $_SERVER['HTTP_REFERER'];

        echo "<script>alert('Anda tidak memiliki hak untuk mengakses halaman ini');</script>";
        echo "<script>location.href = '$link ';</script>";
    }
}
$route = [
    'Login' => ['class' => "app\Standalone", '@' => 'Login'],
    'Daftar' => ['class' => "app\Standalone", '@' => 'Daftar'],
    'Logout' => ['class' => "app\Standalone", '@' => 'Logout'],
    'Home' => ['class' => "app\Standalone", '@' => 'Home'],
    'Dinsos' => ['class' => "app\Admin", '@' => 'Dinsos'],
    'Kelurahan' => ['class' => "app\Admin", '@' => 'Kelurahan'],
    'Pengaturan' => ['class' => "app\Admin", '@' => 'Pengaturan'],

    'Data-Pengguna' => ['class' => "app\Admin", '@' => 'Pengguna'],
    'Laporan-Perawatan' => ['class' => "app\Admin", '@' => 'LaporanPerawatan'],
    'Laporan-Booking' => ['class' => "app\Admin", '@' => 'LaporanBooking'],

];

$ctr = $route[$hal]['class'];
$hal2 = $route[$hal]['@'];
$Controller = new $ctr;
$komponen = 'views/Komponen';
$data = $Controller->$hal2($Request, $Session);

include 'views/html.php';
/* Start to develop here. Best regards https://php-download.com/ */
