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
        $race = Race::find(getenv('RACE_ID'));
        if ($race) {
            $api = json_decode($res->getBody());
            $race->update([
                'state' => $api->params->racestate,
                'info' => [
                    'elapsed' => $api->params->elapsedTime,
                    'safety_car' => ($api->params->safetycar == 'true'),
                    'weather' => ucfirst($api->params->weather),
                    'air' => $api->params->airTemp,
                    'track' => $api->params->trackTemp,
                    'humidity' => $api->params->humidity,
                    'wind' => $api->params->windSpeed,
                    'direction' => $this->parseDirection($api->params->windDirection)
                ],
            ]);
            collect($api->entries)->each(function ($car) use ($race) {
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

    public function parseDirection($deg)
    {
        if ($deg >= 345 && $deg < 15) {
            return "North";
        }
        if ($deg >= 15 && $deg < 75) {
            return "Northeast";
        }
        if ($deg >= 75 && $deg < 105) {
            return "East";
        }
        if ($deg >= 105 && $deg < 165) {
            return "Southeast";
        }
        if ($deg >= 165 && $deg < 195) {
            return "South";
        }
        if ($deg >= 195 && $deg < 255) {
            return "Southwest";
        }
        if ($deg >= 255 && $deg < 285) {
            return "West";
        }
        return "Northwest";
    }
}
