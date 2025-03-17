<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $news = [
            [1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam "Bánh trung thu Bơ Sữa HongKong".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất.', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'],
            [2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất.', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'],
            [3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà.', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'],
            [4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu.', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'],
            [5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h.', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'],
        ];

        foreach ($news as $item) {
            DB::table('news')->insert([
                'id' => $item[0],
                'title' => $item[1],
                'content' => $item[2],
                'image' => $item[3],
                'create_at' => $item[4],
                'update_at' => $item[5],
            ]);
        }
    }
}