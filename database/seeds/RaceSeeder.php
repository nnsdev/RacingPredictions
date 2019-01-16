<?php

use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['Daytona 24 2019', $this->timestamp(1548531300), $this->timestamp(1548617700)],
            ['Twelve Hours of Sebring', $this->timestamp(1552750200), $this->timestamp(1552775400)],
            ['Six Hours of the Glen' , $this->timestamp(1561905000), $this->timestamp(1561926600)],
            ['Petit Le Mans', $this->timestamp(1570899600), $this->timestamp(1570935600)],
        ])->each(function ($race) {
            \App\Models\Race::firstOrCreate([
                'name' => $race[0],
                'race_start' => $race[1] ?? null,
                'race_end' => $race[2] ?? null,
            ]);
        });
    }

    public function timestamp($time)
    {
        return \Carbon\Carbon::createFromTimestamp($time);
    }
}
