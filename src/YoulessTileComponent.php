<?php

namespace Xibel\YoulessTile;

use Xibel\YoulessTile\YoulessStore;
use Livewire\Component;

class YoulessTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        $youlessStore = YoulessStore::make();

        return view('dashboard-youless-tile::tile', [
            'youlessData' => $youlessStore->getData(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.youless.refresh_interval_in_seconds', 60),
        ]);
    }
}
