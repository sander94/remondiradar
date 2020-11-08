<?php

namespace App\Composer;

use App\Service;
use Illuminate\View\View;

class ServicesComposer
{
    public function compose(View $view)
    {
        $view->with('services', Service::all());
    }
}
