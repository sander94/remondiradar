<?php

namespace App\Composer;

use App\Regions;
use Illuminate\View\View;

class RegionsComposer
{
    public function compose(View $view)
    {
        $view->with('allRegions', Regions::all());
    }
}
