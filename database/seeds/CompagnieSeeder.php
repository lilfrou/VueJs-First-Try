<?php

use App\Compagnie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompagnieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            Compagnie::create([
                'name' => Str::random(10),
                'type' => Str::random(10),
                'date' =>Carbon::create('2000', '01', '01'),
                'employes' => 10
            ]);
        }
    }
}
