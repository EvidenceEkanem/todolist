# todolist

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A laravel package that manages your todolist and schedule.

## Installation

requirement: [PHP](https://php.net) 5.4+ and [Composer](https://getcomposer.org).
then run 

``` bash
$ composer require evidenceekanem/todolist
```
Via Composer.

For subsequent updates, you'll need to run `composer install` or 'composer update' to download it and have the autoloader refreshed.

On the off chance that you are utilizing an old version of Laravel and the key isn't produced yet, run `php artisan key:generate`.

## Usage
run:

```bash
php artisan migrate
```
for database migration.

Visit: 

```bash
http://{{site-url}}/tasks
```
to access the package.

Add task categories and tasks. Enjoy.
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email ekanemevidence@gmail.com instead of using the issue tracker.

## Credits

- [evidenceekanem][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/evidenceekanem/todolist.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/evidenceekanem/todolist.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/evidenceekanem/todolist/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/evidenceekanem/todolist
[link-downloads]: https://packagist.org/packages/evidenceekanem/todolist
[link-travis]: https://travis-ci.org/evidenceekanem/todolist
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/evidenceekanem
[link-contributors]: ../../contributors
