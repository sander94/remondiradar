<?php

namespace App\Console\Commands;

use App\Workroom;
use GoogleMaps\Facade\GoogleMapsFacade;
use GoogleMaps\GoogleMaps;
use Illuminate\Console\Command;

class UpdateExistingCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workrooms:sync:addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(GoogleMaps $googleMaps)
    {
        $workrooms = Workroom::query()
            ->whereNotNull('google_maps')
            ->whereNull('lat')
            ->whereNull('lng')->get();

        foreach ($workrooms as $workroom) {
            $response = json_decode($googleMaps->load('geocoding')
                ->setParam(['address' => $workroom->google_maps])
                ->get());

            $workroom->fill((array) $response->results[0]->geometry->location)->save();
        }
    }
}
