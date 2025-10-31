<?php

namespace Database\Seeders;

use App\Models\Settings;
use Eloquent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // eloquent
        // query builder
        // ::
        Settings::create([
            'app_name' => 'Poin Of Sales | PPKD JP',
            'address' => 'Jl Karet Baru',
            'phone_number' => '0812233455'
        ]);

        // DB::table('settings')->create([]);
    }
}
