<?php

namespace App\Http\Controllers;

use GoogleMaps\Facade\GoogleMapsFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Finder;
use App\Regions;
use App\Reviews;
use App\Timeslot;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {


        if (empty($request->region)) {
            $request->region = 1;
        }

        $allRegions = Regions::all();

        // get workrooms and order them by how many reviews they have got
        $workrooms = Workroom::where('region', $request->region)->where('is_active', '1')->where('is_verified', '1')->withCount('reviews')->orderBy('reviews_count', 'desc')->with([
            'reviews' => function ($query) {
                $query->where('is_active', '1');
            },
        ])->get();

        // Make title tag for page
        $currentRegion = Regions::where('id', $request->region)->first();
        $regionName = $currentRegion->region_name;
        //    $title = $regionName->region_name.' - '.count($workrooms).' remonditöökoda | Remondiradar.ee';
        $title = "Remondiradar.ee - Leia kiirelt kohalik remonditöökoda.";
        $og_image = asset('images/web/ogimg.jpg');

        $coordinates = $workrooms->map(function ($item) {
            return ['lat' => (float) $item->lat, 'lng' => (float) $item->lng];
        });

        return view('frontpage', compact('workrooms', 'allRegions', 'coordinates'))->with([
            'region'     => request()->region,
            'regionName' => $regionName,
            'title'      => $title,
            'og_image'   => $og_image,
        ]);
    }

    public function show(Request $request)
    {


        // get the first one to show on page
        $workroom = Workroom::where('slug', $request->slug)->where('is_active', '1')->with([
            'reviews' => function ($query) {
                $query->where('is_active', '1');
                $query->orderBy('stars', 'desc');
            },
        ])->first();

        $timeslots = Timeslot::all()->where('workroom_id', $workroom->id);

        if (! empty ($workroom->company_id)) {
            // get company name
            $company_name = DB::table('users')->where('id', $workroom->company_id)->first();
            $company_realname = $company_name->name;

            // calculate view count
            $newViewCount = $workroom->view_count + 1;

            Workroom::where('id', $request->id)->update([
                'view_count' => $newViewCount,
            ]);

            $region = $workroom->region;
            $allRegions = Regions::all();
            $currentRegion = Regions::all()->where('id', $workroom->region)->first();
            $regionName = $currentRegion->region_name;
            $title = $workroom->brand_name.' | Remondiradar.ee';
            $og_image = asset('images/t_logos/'.$workroom->brand_logo.'');

            return view('show2', compact('workroom', 'timeslots', 'allRegions'))->with([
                'id'               => request()->id,
                'region'           => $region,
                'company_realname' => $company_realname,
                'title'            => $title,
                'og_image'         => $og_image,
                'regionName'       => $regionName,
            ]);
        } else {
            return redirect()->route('frontpage');
        }
    }

    public function aboutUs()
    {
        $allRegions = Regions::all();

        return view('aboutUs', compact('allRegions'))->with([
            'og_image'   => '',
            'title'      => 'Meie missioon | Remondiradar.ee',
            'region'     => '',
            'regionName' => 'Otsi töökoda',
        ]);
    }

    public function writeReview(Request $request)
    {
        $allRegions = Regions::all();
        $review = Reviews::all()->where('token', $request->token)->where('is_active', '0')->first();

        return view('writeReview', compact('review', 'allRegions'))->with([
            'og_image'   => '',
            'title'      => 'Saada tagasiside | Remondiradar.ee',
            'region'     => '',
            'regionName' => 'Otsi töökoda',
        ]);
    }

    public function sendReview(Request $request)
    {
        Reviews::where('token', $request->token)->update([
            'name'      => $request->name,
            'comment'   => $request->comment,
            'stars'     => $request->stars,
            'is_active' => '1',
        ]);

        return redirect('/tagasiside-antud');
    }

    public function thanksForReview()
    {
        $allRegions = Regions::all();

        return view('thanksForReview', compact('allRegions'))->with([
            'og_image'   => '',
            'title'      => 'Saada tagasiside | Remondiradar.ee',
            'region'     => '',
            'regionName' => 'Otsi töökoda',
        ]);
    }

    public function toggleMap(Request $request)
    {
        $toggle = ! $request->cookie('map_toggle');
        $cookie = cookie('map_toggle', $toggle);

        return response()->json(compact('toggle'))
            ->cookie($cookie);
    }
}
