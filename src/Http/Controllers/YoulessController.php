<?php

namespace Xibel\YoulessTile\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Xibel\YoulessTile\YoulessStore;

class YoulessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youlessStore = YoulessStore::make();
        
        return view('dashboard-youless-tile::youless', [
            'youlessData' => $youlessStore->getData(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.youless.refresh_interval_in_seconds', 60)
        ]);
    }

}
