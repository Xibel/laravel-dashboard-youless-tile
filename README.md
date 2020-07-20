# Youless Tile

A tile for Laravel Dashboard that displays statistics from a Youless LS120 Energy Meter.
This tile can be used on the Laravel Dashboard from www.spatie.be.

<img style="max-width:100%; height: auto" src="https://github.com/Xibel/laravel-dashboard-youless-tile/docs/images/youless_tile.png">

For more information about this package see my website: https://www.xibel-it.eu/youless-tile-for-laravel-dashboard/

## Install

Via Composer

```bash
$ composer require xibel/laravel-dashboard-youless-tile
```

## Usage

In the `\config\dashboard.php` config file, you must add this configuration in the `tiles` key:

```php
return [
    // ...
    'tiles' => [
        'youless' => [
            'url' => env('YOULESS_URL'),
            'refresh_interval_in_seconds' => 10,
        ],
    ],
];
```

In `app\Console\Kernel.php` you should schedule the `xibel\YoulessTile\Commands\FetchDataFromYoulessCommand` to run every `1` minute.

```php
protected function schedule(Schedule $schedule)
{
    // Youless tile
        $schedule->command(\xibel\YoulessTile\Commands\FetchDataFromYoulessCommand::class)->everyMinute();

}
```

To fetch data from your Youless at lease once, run 'php artisan schedule:run'. Use  a tool like supervisor to keep the scheduler running.

In the `.env` file, you must add the 'YOULESS_URL' key and provide your Youless IP address or hostname:

```php
YOULESS_URL=x.x.x.x
```

In your dashboard view you use the `livewire:youless-summary-tile` component.

```blade
<x-dashboard>
    <livewire:youless-tile position="a1" />
</x-dashboard>
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more version information.

## Credits

- [Xibel][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/xibel
[link-contributors]: ../../contributors