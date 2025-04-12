<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bid;

class BidSeeder extends Seeder
{
    public function run()
    {
        Bid::create([
            'project_id' => 1,
            'freelancer_id' => 2,
            'bid_amount' => 5000,
            'msg' => 'I am interested in this project.',
        ]);
    }
}
