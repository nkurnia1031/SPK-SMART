<?php

/**
 *
 */

namespace app;

use \Crud as Crud;

class Admin
{

    public function Dinsos($Request, $Session)
    {
        $data = [
            'judul' => 'Data Pengguna [Dinsos]',
            'path' => 'Admin/Dinsos',
            'link' => 'Dinsos',

        ];
        //Fungsi::fields('pengguna', new Crud);
        $fields1 = '[
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"nohp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"username","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"password","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['data'] = collect(Crud::table('pengguna')->select()->where('jenis', 'Dinsos')->get());
        if (isset($Request->key)) {
            $data['key'] = $data['data']->where('idpengguna', $Request->key)->first();
            foreach ($data['form'] as $v => $k) {
                $b = $k['name'];
                $data['form'][$v]['val'] = $data['key']->$b;
            }
        }

        return $data;
    }
    public function Kelurahan($Request, $Session)
    {
        $data = [
            'judul' => 'Data Pengguna [Kelurahan]',
            'path' => 'Admin/Kelurahan',
            'link' => 'Kelurahan',

        ];
        //Fungsi::fields('pengguna', new Crud);
        $fields1 = '[
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"25","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"nohp","label":"No HP","type":"text","max":"12","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"kecamatan","label":"Kecamatan","type":"text","max":"12","pnj":12,"val":null,"red":"required","input":false,"up":true,"tb":true},

                {"name":"kelurahan","label":"Kelurahan","type":"text","max":"12","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"username","label":"Username","type":"text","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true},
                {"name":"password","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"required","input":true,"up":true,"tb":true}
                ]';
        $data['form'] = json_decode($fields1, true);
        $data['data'] = collect(Crud::table('pengguna')->select()->where('jenis', 'Kelurahan')->get());
        $string = file_get_contents("kelurahan.json");
        $data['kelurahan'] = json_decode($string)->kecamatan;
        if (isset($Request->key)) {
            $data['key'] = $data['data']->where('idpengguna', $Request->key)->first();
            foreach ($data['form'] as $v => $k) {
                $b = $k['name'];
                $data['form'][$v]['val'] = $data['key']->$b;
            }
        }

        return $data;
    }
    public function Pengaturan($Request, $Session)
    {
        $data = [
            'judul' => 'Pengaturan',
            'path' => 'Admin/Pengaturan',
            'link' => 'Pengaturan',

        ];
        //Fungsi::fields('pengguna', new Crud);
        $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());
        if ($data['smart']->isEmpty()) {
            Crud::table('smart')->insert(['tahun' => $Session['tahun'], 'min' => 0])->execute();
            $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());

        }
        $data['smart'] = $data['smart']->first();
        $string = file_get_contents("hasil.json");
        $data['hasil'] = json_decode($string, true);

        $data['data.kriteria'] = collect(Crud::table('kriteria')->select()->get());
        $data['max'] = 100 - $data['data.kriteria']->sum('bobot');
        $data['form.kriteria'] = ['kriteria' => null, 'bobot' => 0];

        if (isset($Request->idkriteria)) {
            $data['key'] = $data['data.kriteria']->where('idkriteria', $Request->idkriteria)->first();
            $data['form.kriteria']['kriteria'] = $data['key']->kriteria;
            $data['form.kriteria']['bobot'] = $data['key']->bobot;
            $data['data.subkriteria'] = collect(Crud::table('subkriteria')->select()->where('idkriteria', $data['key']->idkriteria)->get());
            $data['form.subkriteria'] = ['subkriteria' => null, 'nilai' => 0];
            if (isset($Request->idsubkriteria)) {
                $data['key'] = $data['data.subkriteria']->where('idsubkriteria', $Request->idsubkriteria)->first();

                $data['form.subkriteria']['subkriteria'] = $data['key']->subkriteria;
                $data['form.subkriteria']['nilai'] = $data['key']->nilai;
            }

        }
        $data['data.bantuan'] = collect(Crud::table('bantuan')->select()->get());
        $data['form.bantuan'] = ['komponen' => null, 'uang' => 0];

        if (isset($Request->idbantuan)) {
            $data['key'] = $data['data.bantuan']->where('idbantuan', $Request->idbantuan)->first();
            $data['form.bantuan']['komponen'] = $data['key']->komponen;
            $data['form.bantuan']['uang'] = $data['key']->uang;
        }
        if (isset($Request->min)) {
            if (array_key_exists($Session['tahun'], $data['hasil'])) {
                $data['hasil'][$Session['tahun']]['min'] = $Request->min;
                $fp = fopen('results.json', 'w');
                fwrite($fp, json_encode($data['hasil']));
                fclose($fp);

            }
        }
        $data['hasil'] = json_decode(json_encode($data['hasil'][$Session['tahun']]));

        return $data;

    }

    public function LaporanBooking($Request, $Session)
    {
        $data = [
            'judul' => 'Laporan Booking',
            'path' => 'Admin/LaporanBooking',
            'link' => 'Laporan-Booking',

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

}
