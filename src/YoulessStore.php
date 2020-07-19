<?php

namespace Xibel\YoulessTile;

use Spatie\Dashboard\Models\Tile;

class YoulessStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("youless");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('YoulessData', $data);

        return $this;
    }

    public function getData(): array
    {

        return$this->tile->getData('YoulessData') ?? [
            array(
            'time' => 0,
            'netto' => 0,
            'power' => 0,
            's0_time' => 0,
            's0_count' => 0,
            'comp_power' => 0,
            'cons_low' => 0,
            'cons_high' => 0,
            'prod_low' => 0,
            'prod_high' => 0,
            'gas' => 0,
            'time_smartmeter' => 0)
        ];

    }

}