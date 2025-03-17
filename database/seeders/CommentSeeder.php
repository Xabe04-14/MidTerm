<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            [1, 'Nguyễn Ngọc Huy', 'Binh luan demo', 1, '2021-07-09 06:33:56', '2021-07-09 06:33:56'],
            [2, 'Nguyễn Ngọc Huy', 'c j z má', 2, '2021-07-09 06:33:56', '2021-07-09 06:33:56'],
            [3, 'Nguyễn Ngọc Huy', 'good job bro', 3, '2021-07-09 06:33:56', '2021-07-09 06:33:56'],
            [4, 'Nguyễn Ngọc Huy', 'nothing to comment', 4, '2021-07-09 06:33:56', '2021-07-09 06:33:56'],

        ];

        foreach ($comments as $comment) {
            DB::table('comments')->insert([
                'id' => $comment[0],
                'username' => $comment[1],
                'comment' => $comment[2],
                'id_product' => $comment[3],
                'created_at' => $comment[4],
                'updated_at' => $comment[5],
            ]);
        }
    }
}