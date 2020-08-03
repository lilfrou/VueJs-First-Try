<?php

use App\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 120; $i++) {
            $from = rand(1, 30);
            $to = rand(1, 30);
            if ($from != $to) {
                Message::create([
                    'from' => $from,
                    'to' => $to,
                    'text' => Str::random(15),

                ]);
            }
        }
    }
}
