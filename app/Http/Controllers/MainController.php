<?php

namespace App\Http\Controllers;

use App\Service;
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
        /** @var \App\Regions $region */
        $region = Regions::query()->default()->first();

        return $this->region($region, $request);
    }

    public function region(Regions $region, Request $request)
    {
        $services = explode(',', $request->query('services')) ?? [];

        $workrooms = $this->getWorkroomsForRegion($region, $services);

        $regionName = $region->region_name;
        $title = "Remondiradar.ee - Leia kiirelt kohalik remonditöökoda.";
        $og_image = asset('images/web/ogimg.jpg');

        $mapWorkrooms = Workroom::query()
            ->when(count($services) >= 1 && $services[0] !== "", function ($query) use ($services) {
                return $query->whereHas('services', function ($query) use ($services) {
                    return $query->whereIn('id', $services);
                }, '>=', count($services));
            })
            ->active()
            ->verified()
            ->get();

        $services = Service::query()->get();


        $advertisements = $region->activeAdvertisements()->inRandomOrder()->limit(2)->get();


        return view('frontpage', compact('workrooms', 'mapWorkrooms'))->with([
            'region' => $region,
            'regionName' => $regionName,
            'title' => $title,
            'og_image' => $og_image,
            'services' => $services,
            'advertisements' => $advertisements
        ]);
    }

    public function show(Request $request)
    {
        // get the first one to show on page
        /** @var Workroom $workroom */
        $workroom = Workroom::where('slug', $request->slug)->where('is_active', '1')->with([
            'reviews' => function ($query) {
                $query->where('is_active', '1')
                    ->orderBy('stars', 'desc');
            },
        ])->first();

        $timeslots = Timeslot::all()->where('workroom_id', $workroom->id);

        if (!empty ($workroom->company_id)) {
            // get company name
            $company_name = DB::table('users')->where('id', $workroom->company_id)->first();
            $company_realname = $company_name->name;
            $workroomId = $workroom->id;

            // calculate view count
            $newViewCount = $workroom->view_count + 1;

            Workroom::where('id', $workroomId)->update([
                'view_count' => $newViewCount,
            ]);

            $region = Regions::find($workroom->region);
            $currentRegion = Regions::all()->where('id', $workroom->region)->first();
            $regionName = $currentRegion->region_name;
            $title = $workroom->brand_name . ' | Remondiradar.ee - kõik kohalikud autoremonditöökojad';
            $og_image = asset('images/t_logos/' . $workroom->brand_logo . '');

            $reviews = $workroom->reviews->sortByDesc(function ($review, $key) {
                return $review->stars + strlen($review->comment);
            });

            $services = $workroom->services()->get();

            return view('show2', compact('workroom', 'timeslots'))->with([
                'id' => request()->id,
                'region' => $region,
                'company_realname' => $company_realname,
                'title' => $title,
                'og_image' => $og_image,
                'regionName' => $regionName,
                'reviews' => $reviews,
                'services' => $services,
            ]);
        } else {
            return redirect()->route('frontpage');
        }
    }

    public function aboutUs()
    {
        return view('aboutUs')->with([
            'og_image' => '',
            'title' => 'Meie missioon | Remondiradar.ee',
            'region' => '',
            'regionName' => 'Vali maakond',
        ]);
    }

    public function writeReview(Request $request)
    {
        $review = Reviews::all()->where('token', $request->token)->where('is_active', '0')->first();

        return view('writeReview', compact('review'))->with([
            'og_image' => '',
            'title' => 'Saada tagasiside | Remondiradar.ee',
            'region' => '',
            'regionName' => 'Vali maakond',
        ]);
    }

    public function sendReview(Request $request)
    {
        Reviews::where('token', $request->token)->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'stars' => $request->stars,
            'is_active' => '1',
        ]);

        return redirect('/tagasiside-antud');
    }

    public function thanksForReview()
    {
        return view('thanksForReview')->with([
            'og_image' => '',
            'title' => 'Saada tagasiside | Remondiradar.ee',
            'region' => '',
            'regionName' => 'Vali maakond',
        ]);
    }

    public function toggleMap(Request $request)
    {
        $cookie = $request->cookie('map_disabled');
        if ($cookie === null) {
            $cookie = false;
        }

        $disabled = !$cookie;
        $cookie = cookie('map_disabled', $disabled);

        return response()->json(compact('disabled'))
            ->cookie($cookie);
    }

    private function getWorkroomsForRegion(Regions $region, $services)
    {
        return $region
            ->workrooms()
            ->when(count($services) >= 1 && $services[0] !== "", function ($query) use ($services) {
                return $query->whereHas('services', function ($query) use ($services) {
                    return $query->whereIn('id', $services);
                }, '>=', count($services));
            })
            ->active()
            ->verified()
            ->withCount('reviews')
            ->orderBy('reviews_count', 'desc')
            ->with([
                'reviews' => function ($query) {
                    $query->where('is_active', '1');
                },
            ])->get();
    }

    public function saveContactClick(Workroom $workroom)
    {
        $workroom->increment('contact_clicks', 1);

        return ['status' => 'ok'];
    }
}
