<?php

/**
 *
 */

namespace app;

use \Crud as Crud;

class Standalone
{

    public function Login($Request, $Session)
    {
        $data = [
            'judul' => 'Login',
            'path' => 'Login',
            'link' => 'Login',

        ];

        if (isset($Request->login)) {
            $data['admin'] = collect(Crud::table('pengguna')->select()->where('username', $Request->user)->where('password', $Request->pass)->get());
            if ($data['admin']->isEmpty()) {
                echo "<script>alert('Maaf, Username atau Password yang anda inputkan salah');</script>";
                echo "<script>location.href = 'Login';</script>";
                die();
            } else {
                $_SESSION['admin'] = $data['admin']->first();
                $_SESSION['tahun'] = $Request->tahun;
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location.href = 'Home';</script>";
                die();
            }

        }
        return $data;
    }
    public function Daftar($Request, $Session)
    {
        $data = [
            'judul' => 'Daftar',
            'path' => 'Daftar',
            'link' => 'Daftar',

        ];
        // Fungsi::fields('pengguna', $Crud);
        $fields1 = '[
                {"name":"idpengguna","label":"ID Pengguna","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['user.form'] = json_decode($fields1, true);
        $fields1 = '[
                {"name":"no_hp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},

                {"name":"email","label":"Email","type":"email","max":"35","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"username","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"password","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true}
                ]';
        $data['user.form2'] = json_decode($fields1, true);

        $data['user.form'][0]['val'] = "P-" . uniqid();

        return $data;
    }
    public function Profil($Request, $Session)
    {
        $data = [
            'judul' => 'Profil',
            'path' => 'Profil',
            'link' => 'Profil',

        ];
        // Fungsi::fields('pengguna', $Crud);
        $fields1 = '[
                {"name":"idpengguna","label":"ID Pengguna","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"alamat","label":"Alamat","type":"text","max":"40","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['user.form'] = json_decode($fields1, true);
        $fields1 = '[
                {"name":"no_hp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},

                {"name":"email","label":"Email","type":"email","max":"35","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"username","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"password","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true}
                ]';
        $data['user.form2'] = json_decode($fields1, true);

        $data['user.form'][0]['val'] = "P-" . uniqid();

        foreach ($data['user.form'] as $v => $k) {
            $b = $k['name'];
            $data['user.form'][$v]['val'] = $Session['admin']->$b;

        }
        foreach ($data['user.form2'] as $v => $k) {
            $b = $k['name'];
            $data['user.form2'][$v]['val'] = $Session['admin']->$b;

        }

        return $data;
    }
    public function Perawatan($Request, $Session)
    {
        $data = [
            'judul' => 'Daftar Perawatan',
            'path' => 'Perawatan',
            'link' => 'Perawatan',

        ];
        //Fungsi::fields('perawatan', new Crud);
        $fields1 = '[
                {"name":"id_perawatan","label":"ID Perawatan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true},
                {"name":"nama_perawatan","label":"Nama Perawatan","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"jenis_perawatan","label":"Jenis Perawatan","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"gambar","label":"Gambar","type":"text","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"desk","label":"Deskripsi","type":"textarea","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['form'][0]['val'] = "Pn-" . uniqid();

        return $data;
    }
    public function Booking($Request, $Session)
    {
        $data = [
            'judul' => 'Data Booking',
            'path' => 'Booking',
            'link' => 'Booking',

        ];
        //Fungsi::fields('perawatan', new Crud);
        $fields1 = '[
                {"name":"id_perawatan","label":"ID Perawatan","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true},
                {"name":"nama_perawatan","label":"Nama Perawatan","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"jenis_perawatan","label":"Jenis Perawatan","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"gambar","label":"Gambar","type":"text","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"desk","label":"Deskripsi","type":"textarea","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['form'][0]['val'] = "Pn-" . uniqid();
        $data['data'] = collect(Crud::table('perawatan')->select()->get());

        return $data;
    }
    public function KBooking($Request, $Session)
    {
        $data = [
            'judul' => 'Kelola Booking',
            'path' => 'KBooking',
            'link' => 'KBooking',

        ];
        //Fungsi::fields('perawatan', new Crud);
        $fields1 = '[
                {"name":"id_perawatan","label":"ID Booking","type":"text","max":"15","pnj":12,"val":null,"red":"readonly","input":true,"up":true,"tb":true},
                {"name":"gambar","label":"Tanggal Booking","type":"text","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},

                {"name":"nama_perawatan","label":"Nama Perawatan","type":"text","max":"30","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"jenis_perawatan","label":"Jenis Perawatan","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"harga","label":"Harga","type":"number","max":null,"pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"desk","label":"Deskripsi","type":"textarea","max":"65535","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['form'][0]['val'] = "Pn-" . uniqid();
        $data['data'] = collect(Crud::table('perawatan')->select()->get());

        return $data;
    }
    public function Logout()
    {
        session_destroy();
        echo "<script>alert('Berhasil');</script>";
        echo "<script>location.href = 'Login';</script>";
        die();
    }

    public function Home()
    {
        $data = [
            'judul' => 'Home',
            'path' => 'Home',
            'link' => 'Home',
            'icon' => 'fa-home',

            'warna' => 'primary',

        ];
        return $data;
    }

}
