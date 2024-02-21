<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketType::create([
            'ticketType' => 'Adult',
            'price' => 250,
            ]);

        TicketType::create([
            'ticketType' => 'Children (5-17)',
            'price' => 350,
            ]);
    }
}