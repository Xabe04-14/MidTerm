<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    public function run()
    {
        $bills = [
            [14, 14, '2017-03-23', 160000, 'COD', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'],
            [13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'],
            [12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'],
            [11, 11, '2017-03-21', 420000, 'COD', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'],
            [15, 15, '2017-03-24', 220000, 'COD', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'],
            // Thêm các hóa đơn khác ở đây...
            [59, 67, '2021-10-19', 170000, 'vnpay', 'Mua hang', '2021-10-19 03:20:49', '2021-10-19 03:20:49'],
        ];

        foreach ($bills as $bill) {
            DB::table('bills')->insert([
                'id' => $bill[0],
                'customer_id' => $bill[1],
                'date_order' => $bill[2],
                'total' => $bill[3],
                'payment' => $bill[4],
                'note' => $bill[5],
                'created_at' => $bill[6],
                'updated_at' => $bill[7],
            ]);
        }
    }
}