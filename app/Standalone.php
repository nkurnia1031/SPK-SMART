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
        $string = file_get_contents("quotes.json");
        $data['quote'] = collect(json_decode($string)->quotes)->random();
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

    public function Logout()
    {
        session_destroy();
        echo "<script>alert('Berhasil');</script>";
        echo "<script>location.href = 'Login';</script>";
        die();
    }

    public function Home($Request, $Session)
    {
        $data = [
            'judul' => 'Home',
            'path' => 'Home',
            'link' => 'Home',
            'icon' => 'fa-home',

            'warna' => 'primary',

        ];
        $data['kelurahan'] = collect(Crud::table('pengguna')->select()->where('jenis', 'Kelurahan')->get())->unique('kelurahan');
        $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());
        $data['status_kel'] = collect(Crud::table('status_kel')->select()->where('kelurahan', '!=', '-')->where('tahun', $Session['tahun'])->get());
        if ($Session['admin']->jenis == 'Kelurahan') {
            if ($data['status_kel']->where('kelurahan', $Session['admin']->kelurahan)->isEmpty()) {
                Crud::table('status_kel')->insert(['tahun' => $Session['tahun'], 'kecamatan' => $Session['admin']->kecamatan, 'kelurahan' => $Session['admin']->kelurahan, 'status' => 'Belum'])->execute();
                $data['status_kel'] = collect(Crud::table('status_kel')->select()->where('kelurahan', '!=', '-')->where('tahun', $Session['tahun'])->get());

            }
        }

        if ($data['smart']->isEmpty()) {
            Crud::table('smart')->insert(['tahun' => $Session['tahun'], 'min' => 0])->execute();
            $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());
        }
        $data['status_kel'] = $data['status_kel']->groupBy('kecamatan');
        return $data;
    }
    public function Keluarga($Request, $Session)
    {
        $data = [
            'judul' => 'Data Keluarga',
            'path' => 'Kelurahan/Keluarga',
            'link' => 'Keluarga',
            'icon' => 'fa-home',
            'warna' => 'primary',
        ];
        //Fungsi::fields('keluarga', new Crud);
        $fields1 = '[
                {"name":"nik","label":"NIK","type":"text","max":"16","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"25","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"alamat","label":"Alamat","type":"textarea","max":"100","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['keluarga'] = collect(Crud::table('keluarga')->select()->where('tahun', $Session['tahun'])->get())->map(function ($item, $key) use ($data) {
            $item->tanggungan = collect(json_decode($item->tanggungan));
            $item->kriteria = json_decode($item->kriteria);
            return $item;
        });
        if ($Session['admin']->jenis == 'Kelurahan') {
            $data['keluarga'] = $data['keluarga']->where('kelurahan', $Session['admin']->kelurahan);
        }
        $data['bantuan'] = collect(Crud::table('bantuan')->select()->get())->map(function ($item, $key) use ($data) {
            $item->val = 0;
            return $item;
        });
        $data['subkriteria'] = collect(Crud::table('subkriteria')->select()->join('kriteria', 'kriteria.idkriteria', '=', 'subkriteria.idkriteria')->get());
        $data['kriteria'] = collect(Crud::table('kriteria')->select()->get())->map(function ($item, $key) use ($data) {
            $item->val = null;
            $item->subkriteria = $data['subkriteria']->where('idkriteria', $item->idkriteria);
            return $item;
        });
        if (isset($Request->key)) {
            $data['keluarga.key'] = $data['keluarga']->where('idkeluarga', $Request->key)->first();
            foreach ($data['form'] as $v => $k) {
                $b = $k['name'];
                $data['form'][$v]['val'] = $data['keluarga.key']->$b;
            }
            $kriteria = collect($data['keluarga.key']->kriteria);
            $tanggungan = collect($data['keluarga.key']->tanggungan);
            $data['bantuan'] = $data['bantuan']->map(function ($item, $key) use ($tanggungan) {
                $item->val = $tanggungan->where('idbantuan', $item->idbantuan)->sum('jum');
                return $item;
            });
            $data['kriteria'] = $data['kriteria']->map(function ($item, $key) use ($kriteria) {
                $r = $kriteria->where('idkriteria', $item->idkriteria);
                if ($r->isEmpty()) {
                    $item->val = 0;

                } else {
                    $item->val = $r->first()->idsubkriteria;

                }
                return $item;
            });
        }

        return $data;
    }
    public function Galeri($Request, $Session)
    {
        $data = [
            'judul' => 'Galeri Kegiatan',
            'path' => 'Galeri',
            'link' => 'Galeri',
            'icon' => 'fa-home',
            'warna' => 'primary',
        ];
        //Fungsi::fields('keluarga', new Crud);
        $data['a'] = scandir('foto');
        array_shift($data['a']);
        array_shift($data['a']);
        return $data;
    }
    public function Laporan($Request, $Session)
    {
        $data = [
            'judul' => 'Laporan',
            'path' => 'Laporan',
            'link' => 'Laporan',
            'icon' => 'fa-print',
            'warna' => 'primary',
        ];
        $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());
        if ($data['smart']->isEmpty()) {
            Crud::table('smart')->insert(['tahun' => $Session['tahun'], 'min' => 0])->execute();
            $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());

        }
        $data['bantuan'] = collect(Crud::table('bantuan')->select()->where('tipe', 'primary')->get());

        $data['smart'] = $data['smart']->first();
        $data['proses'] = collect(json_decode($data['smart']->proses));
        if ($Session['admin']->jenis == 'Kelurahan') {
            $data['proses'] = $data['proses']->where('kelurahan', $Session['admin']->kelurahan);
        }
        $data['proses'] = $data['proses']->map(function ($item) {
            if ($item->hasil == 'Layak') {
                $item->uang = collect($item->tanggungan2)->sum('total') + collect($item->tanggungan1)->sum('uang');
            }
            return $item;
        });
        $data['kriteria'] = collect(json_decode($data['smart']->kriteria));

        return $data;
    }
    public function Simulasi($Request, $Session)
    {
        $data = [
            'judul' => 'Simulasi bantuan',
            'path' => 'Simulasi',
            'link' => 'Simulasi',
            'icon' => 'fa-print',
            'warna' => 'primary',
        ];

        $data['bantuan'] = collect(Crud::table('bantuan')->select()->get());
        if (isset($Request->tanggungan)) {
            foreach ($data['bantuan'] as $v => $k) {
                if (property_exists($Request->tanggungan, $k->idbantuan)) {
                    $r = $k->idbantuan;
                    $data['bantuan'][$v]->jum = $Request->tanggungan->$r->jum;
                    $data['bantuan'][$v]->total = $Request->tanggungan->$r->jum * $data['bantuan'][$v]->uang;
                }

            }
            if ($data['bantuan']->where('tipe', 'Secondary')->where('jum', '>', 0)->isEmpty()) {
                echo "<script>alert('Maaf tidak boleh 0 semua');</script>";
                echo "<script>location.href = 'Simulasi';</script>";
                die();
            }

        }

        return $data;
    }

}
