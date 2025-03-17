<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer; 

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name' => 'ê',
                'gender' => 'Nữ',
                'email' => 'huongnguyen@gmail.com',
                'address' => 'e',
                'phone_number' => 'e',
                'note' => 'e',
                'created_at' => '2017-03-24 07:14:32',
                'updated_at' => '2017-03-24 07:14:32'
            ],
            [
                'name' => 'hhh',
                'gender' => 'Nam',
                'email' => 'hanguyen@gmail.com',
                'address' => 'Lê thị riêng',
                'phone_number' => '99999999999999999',
                'note' => 'k',
                'created_at' => '2017-03-23 04:46:05',
                'updated_at' => '2017-03-23 04:46:05'
            ],
            [
                'name' => 'Hương Hương',
                'gender' => 'Nữ',
                'email' => 'hungnguyenak96@gmail.com',
                'address' => 'Lê Thị Riêng, Quận 1',
                'phone_number' => '23456789',
                'note' => 'Vui lòng giao hàng trước 5h',
                'created_at' => '2017-03-21 07:29:31',
                'updated_at' => '2017-03-21 07:29:31'
            ],
            [
                'name' => 'Khoa phạm',
                'gender' => 'Nam',
                'email' => 'khoapham@gmail.com',
                'address' => 'Lê thị riêng',
                'phone_number' => '1234567890',
                'note' => 'Vui lòng chuyển đúng hạn',
                'created_at' => '2017-03-21 07:20:07',
                'updated_at' => '2017-03-21 07:20:07'
            ],
            [
                'name' => 'Nguyễn Ngọc Huy',
                'gender' => 'Nam',
                'email' => 'huy.nguyen22@student.passerellesnumeriques.org',
                'address' => '101B Lê Hữu Trác, Phước Mỹ, Sơn Trà, Đà Nẵng.',
                'phone_number' => '0355621838',
                'note' => 'Không có ghi chú gì',
                'created_at' => '2021-06-15 02:10:07',
                'updated_at' => '2021-06-15 02:10:07'
            ],
        ];

        // Thêm dữ liệu vào database
        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
