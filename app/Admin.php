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
        $data['form.bantuan'] = ['komponen' => null, 'uang' => 0, 'tipe' => null];

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
    public function Proses($Request, $Session)
    {
        $data = [
            'judul' => 'Proses SMART',
            'path' => 'Admin/Proses',
            'link' => 'Proses',

        ];
        //Fungsi::fields('pengguna', new Crud);
        $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());
        if ($data['smart']->isEmpty()) {
            Crud::table('smart')->insert(['tahun' => $Session['tahun'], 'min' => 0])->execute();
            $data['smart'] = collect(Crud::table('smart')->select()->where('tahun', $Session['tahun'])->get());

        }
        $data['smart'] = $data['smart']->first();
        $data['proses'] = collect(json_decode($data['smart']->proses));
        $data['kriteria'] = collect(json_decode($data['smart']->kriteria));

        $data['status_kel'] = collect(Crud::table('status_kel')->select()->where('tahun', $Session['tahun'])->get());
        $data['belum'] = $data['status_kel']->where('status', 'Belum');
        if (isset($Request->p)) {
            $smart = array();

            $smart['data.bantuan'] = collect(Crud::table('bantuan')->select()->get());
            $data['subkriteria'] = collect(Crud::table('subkriteria')->select()->get());

            $smart['kriteria'] = collect(Crud::table('kriteria')->select()->get())->map(function ($item, $key) use ($data) {
                $item->subkriteria = $data['subkriteria']->where('idkriteria', $item->idkriteria);
                return $item;
            });
            $smart['keluarga'] = collect(Crud::table('keluarga')->select()->where('tahun', $Session['tahun'])->get())->map(function ($item, $key) use ($data, $smart) {
                $item->tanggungan = json_decode($item->tanggungan);
                $item->kriteria = collect(json_decode($item->kriteria));
                foreach ($smart['kriteria'] as $v => $x) {
                    $r = 'K' . ($v + 1);
                    $t = $item->kriteria->where('idkriteria', $x->idkriteria);
                    if ($t->isEmpty()) {
                        $item->$r = "Tidak Terdata";

                    } else {
                        $item->$r = $t->first()->nilai;

                    }

                }
                return $item;
            });
            $smart['keluarga'] = $smart['keluarga']->map(function ($item, $key) use ($data, $smart) {
                $t = array();
                foreach ($smart['kriteria'] as $v => $x) {
                    $r = 'NK' . ($v + 1);
                    $r3 = 'UK' . ($v + 1);
                    $r2 = 'K' . ($v + 1);

                    @$item->$r = ($item->$r2 - $smart['keluarga']->min($r2)) / ($smart['keluarga']->max($r2) - $smart['keluarga']->min($r2));
                    if (is_nan($item->$r)) {
                        $item->$r = 0;
                    }
                    $item->$r3 = $item->$r * $x->bobot;
                    array_push($t, $item->$r3);
                }
                $item->total = array_sum($t);
                return $item;
            });
            $kriteria = $smart['kriteria']->toJson();

            $smart = json_encode($smart['keluarga']);
            $t = Crud::table('smart')->update(['proses' => $smart, 'kriteria' => $kriteria])->where('tahun', $Session['tahun'])->execute();
            echo "<script>alert('Selesai');</script>";
            echo "<script>location.href = 'Proses';</script>";
            die();

        }

        return $data;

    }

}
