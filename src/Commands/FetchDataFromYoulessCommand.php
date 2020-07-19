<?php

namespace Xibel\YoulessTile\Commands;

use Illuminate\Console\Command;
use Xibel\YoulessTile\Services\Youless;
use Xibel\YoulessTile\YoulessStore;

class FetchDataFromYoulessCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-youless';

    protected $description = 'Fetch Youless data for tile';

    public function handle()
    {
        $this->info('Fetching Youless energy...');

        $energy = Youless::getEnergy(config('dashboard.tiles.youless.url'));

        if (count($energy)) {
            YoulessStore::make()->setData($energy);
        }

        $this->info('All done!');
    }
}