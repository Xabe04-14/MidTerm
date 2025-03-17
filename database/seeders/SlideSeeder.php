<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    public function run()
    {
        $slides = [
            [1, '', 'banner1.jpg'],
            [2, '', 'banner2.jpg'],
            [3, '', 'banner3.jpg'],
            [4, '', 'banner4.jpg'],
        ];

        foreach ($slides as $slide) {
            DB::table('slide')->insert([
                'id' => $slide[0],
                'link' => $slide[1],
                'image' => $slide[2],
            ]);
        }
    }
}