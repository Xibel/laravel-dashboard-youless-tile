# Youless Tile

[![Latest Version on Packagist]][link-packagist]
[![Total Downloads]][link-downloads]

A tile for Laravel Dashboard that displays statistics from a Youless LS120 Energy Meter

## Install

Via Composer

```bash
$ composer require xibel/laravel-dashboard-youless-tile
```

## Usage

In the `app\config\dashboard.php` config file, you must add this configuration in the `tiles` key:

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
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // Youless tile
        $schedule->command(\xibel\YoulessTile\Commands\FetchDataFromYoulessCommand::class)->everyMinute();

}
```

In the `.env` file, you must add the 'YOULESS_URL' key and provide your Youless IP address or hostname:

```php
YOULESS_URL=x.x.x.x
```

In your dashboard view you use the `livewire:youless-summary-tile` component.

```blade
<x-dashboard>
    <livewire:youless-summary-tile position="a1" />
</x-dashboard>
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more version information.

## Credits

- [Xibel][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/xibel/laravel-dashboard-youless-tile
[link-downloads]: https://packagist.org/packages/xibel/laravel-dashboard-youless-tile
[link-author]: https://github.com/xibel
[link-contributors]: ../../contributors