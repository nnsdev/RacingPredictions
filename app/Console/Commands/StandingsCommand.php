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
    protected $description = 'Update IMSA standings';

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
        $res = $client->request('GET', 'https://scoring.imsa.com/scoring_data/RaceResults_JSONP.json?callback=jsonpRaceResults&_=' . now()->timestamp);
        $race = Race::find(getenv('RACE_ID'));
        if ($race) {
            $api = json_decode(rtrim(ltrim($res->getBody()->getContents(), 'jsonpRaceResults('), ');'));
            // $race->update(['state' => $api->params->racestate]);
            collect($api->B)->each(function ($car) use ($race) {
                $db = $race->cars()->where('car_number', $car->N)->first();
                if ($db) {
                    $race->cars()->updateExistingPivot($db->id, [
                        'position' => $car->PIC ?? "?",
                        'state' => ($car->P == 1) ? "IN" : "??",
                        'current_driver' => $car->F ?? "-",
                        'gap_to_leader' => ($car->DIC == "--.---") ? "-" : $car->DIC,
                        'last_lap' => $car->LL ?? "?",
                    ]);
                }
            });
            Prediction::awardPoints($race);
        }
    }
}
