<?php

namespace Database\Seeders;

use App\Modules\Categories\Model\Category;
use App\Modules\OrderStatuses\Model\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => OrderStatus::ACTIVE,
            ],
            [
                'name' => OrderStatus::EXPIRED,
            ],
            [
                'name' => OrderStatus::ISSUED,
            ],
            [
                'name' => OrderStatus::PAID,
            ],
        ];

        Category::query()->insertOrIgnore($data);
    }
}
