<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dashboard;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            User::create(
                [

                    'name' => 'Admin',

                    'email' => 'admin@mail.com',

                    'password' => bcrypt('admin123'),
                ]
            );

            Dashboard::create(
                [

                    'nama' => 'Mitra Jamur Bondowoso',

                    'alamat' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.8557921272936!2d113.8707379147795!3d-8.013803594228966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x60ec956105b54ae5!2zOMKwMDAnNDkuNyJTIDExM8KwNTInMjIuNSJF!5e0!3m2!1sid!2sid!4v1653060137830!5m2!1sid!2sid',

                    'logo' => 'frontend/img/logo.png',

                    'deskripsi' => 'Mitra Jamur Bondowoso merupakan sebuah usaha yang dirintis sejak SMA oleh seseorang yang bernama Syair. Mitra Jamur Bondowoso adalah peluang usaha dengan budidaya jamur tiram dan pembuatan bag log. Mitra Jamur Bondowoso tersebut berasal dari desa Jambeanom, Kecamatan Jambesari Darusollah, Bondowoso.',

                    'whatsapp' => '6282244112791',

                    'instagram' => 'https://www.instagram.com/syair_devinci/',

                    'twitter' => 'https://twitter.com/SyairV',

                    'facebook' => 'https://www.facebook.com/Mitra-Jamur-Bondowoso-593256841159383',

                    'youtube' => 'https://www.youtube.com/channel/UCCLLUq6aN0wXKeabf9tRb5Q',

                    'gmail' => 'syairadirawan96@gmail.com'
                ]
            );
        }
    }
}
