<?php

namespace App\Console\Commands;

use App\Workroom;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

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
        $sitemap = Sitemap::create();

        $workrooms = Workroom::all();

        foreach ($workrooms as $workroom) {
            $sitemap->add(Url::create(route('workroom.show', $workroom, false))
                ->setLastModificationDate($workroom->updated_at));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
