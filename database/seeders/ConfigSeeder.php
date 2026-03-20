<?php

namespace Database\Seeders;

use App\Models\SystemConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemConfig::updateOrCreate(
            [
                'email' => 'info@myseniorsupportsolutions.com ',
                'phone' => '+17722629721 ',
                'phoneSecond' => '+17867087286',
                'address' => null,
            ]
        );
    }
}
