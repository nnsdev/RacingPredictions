<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\Race;
use App\Models\Prediction;
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
        $res = $client->request('GET', 'https://storage.googleapis.com/fiawec-prod/assets/live/WEC/__data.json?_=' . now()->timestamp);
        $race = Race::whereDate('race_start', '<', now())->whereDate('race_end', '>', now())->first();
        if($race) {
            collect(json_decode($res->getBody())->entries)->each(function ($car) use ($race) {
                $db = $race->cars()->where('car_number', $car->number)->first();
                if ($db) {
                    $race->cars()->updateExistingPivot($db->id, [
                        'position' => $car->categoryPosition ?? "?",
                        'state' => $car->state ?? "IN",
                        'current_driver' => $car->driver ?? "-",
                        'gap_to_leader' => (!$car->classGap) ? "?" : ($car->classGap == "") ? "0" : $car->classGap,
                        'last_lap' => $car->lastlap ?? "?",
                    ]);
                }
            });
            Prediction::awardPoints($race);
        }
    }
}
