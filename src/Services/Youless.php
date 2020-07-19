<?php

namespace Xibel\YoulessTile\Services;

use Illuminate\Support\Facades\Http;
use Log;

class Youless
{
    public static function getEnergy(string $url): ?array
    {
        $response = Http::get("{$url}/e");

        if (! $response->ok()) {
            return [];
        }

        // response should look like: [{"tm":1483263967,"net": 2089.772,"pwr": 466,"ts0":1483228800,"cs0": 0.000,"ps0": 0,"p1": 2735.245,"p2": 2257.731,"n1": 836.150,"n2": 2067.054,"gas": 2321.229,"gts":2007150025}]  

        $data = $response->json();

        return(array_map(function($data) {
            return array(
                'time' => $data['tm'],
                'netto' => $data['net'],
                'power' => $data['pwr'],
                's0_time' => $data['ts0'],
                's0_count' => $data['cs0'],
                'comp_power' => $data['ps0'],
                'cons_low' => $data['p1'],
                'cons_high' => $data['p2'],
                'prod_low' => $data['n1'],
                'prod_high' => $data['n2'],
                'gas' => $data['gas'],
                'time_smartmeter' => $data['gts']
            );
        }, $data));
    }
}
