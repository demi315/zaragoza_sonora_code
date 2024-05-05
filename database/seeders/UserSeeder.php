<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'Zaragoza Sonora';
        $user->email = 'admin@zaragozasonora.es';
        $user->password = 'ZaragozaSonora';
        $user->info = 'Cuenta oficial de Zaragoza Sonora';

        $path = '/var/www/html/zaragoza_sonora/public/images/ZS_Logo_Negro.png';
        $source = file_get_contents($path);
        $base64 = base64_encode($source);
        $blob = 'data:png;base64,'.$base64;
        $user->pfp = $blob;
        $user->admin = 1;
        $user->save();
    }
}
