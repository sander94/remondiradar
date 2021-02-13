<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        views($advertisement)->record();

        return redirect()->to($advertisement->getAttribute('url'));
    }
}
