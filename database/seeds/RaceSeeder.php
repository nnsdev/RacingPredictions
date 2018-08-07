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
            ['24h Le Mans 2018', $this->timestamp(1529155800), $this->timestamp(1529242200)],
            ['6h of Silverstone', $this->timestamp(1534680000), $this->timestamp(1534701600)],
            ['6h of Fuji'],
            ['6h of Shanghai'],
            ['1000 miles of Sebring'],
            ['24h Le Mans 2019', $this->timestamp(1560605400), $this->timestamp(1560691800)],
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
