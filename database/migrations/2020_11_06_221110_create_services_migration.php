<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $services = [
            'Üldremont',
            'Hooldus',
            'Ülevaatus',
            'Diagnostika',
            'Elektritööd',
            'Helisüsteem',
            'Kere- ja värvitööd',
            'Klaasivahetus',
            'Salongitööd',
            'Rehvivahetus',
            'Mootoriremont',
            'Käigukasti remont',
            'Kliimaseadme tööd',
            'Välipesu',
            'Keemiline puhastus',
            'Tulede poleerimine',
        ];

        foreach ($services as $title) {
            \App\Service::query()->create(compact('title'));
        }

        /** @var \App\Service $service */
        $service = \App\Service::query()->where('title', $services[0])->first();
        $workRooms = \App\Workroom::query()->pluck('id');

        $service->workRooms()->sync($workRooms);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
