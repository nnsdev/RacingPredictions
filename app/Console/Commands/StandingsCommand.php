<?php

namespace App\Console\Commands;

use App\Car;
use Illuminate\Console\Command;

class StandingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'standings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update WEC standings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://storage.googleapis.com/fiawec-prod/assets/live/WEC/__data.json');
        collect(json_decode($res->getBody())->entries)->each(function ($car) {
            $db = Car::where('car_number', $car->number)->first();
            if ($db) {
                $db->update([
                    'position' => ($category->position) ?? "?",
                    'state' => $car->state ?? "IN",
                    'current_driver' => $car->driver ?? "-",
                    'gap_to_leader' => (!$car->classGap) ? "?" : ($car->classGap == "") ? "0" : $car->classGap,
                    'last_lap' => $car->lastlap ?? "?",
                ]);
            }
        });
    }
}
