<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DataAwal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peran = new Role();
        $peran->name = 'admin';
        $peran->save();


        $peran = new Role();
        $peran->name = 'petugas';
        $peran->save();


        $peran = new Role();
        $peran->name = 'masyarakat';
        $peran->save();

        $admin           = new User();
        $admin->email    = 'min@min.com';
        $admin->password = bcrypt('1234567890');
        $admin->name     = 'Admin Ronny';
        $admin->telp     = '0987654321';
        $admin->nik      = '77778239304747489';
        $admin->save();
        $admin->attachRole('admin');

        $petugas           = new User();
        $petugas->email    = 'gas@gas.com';
        $petugas->password = bcrypt('0987654321');
        $petugas->name     = 'Petugas Ronny';
        $petugas->telp     = '08888888895';
        $petugas->nik      = '4876078674544444';
        $petugas->save();
        $petugas->attachRole('petugas');
    }
}
