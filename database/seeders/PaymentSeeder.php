<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'milestone_id' => 1,
            'freelancer_id' => 2,
            'transaction_id' => 'TXN12345',
            'amount' => 2000,
        ]);
    }
}
