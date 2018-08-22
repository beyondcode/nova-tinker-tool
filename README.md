# Nova Tinker Tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beyondcode/nova-tinker-tool.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-tinker-tool)
[![Total Downloads](https://img.shields.io/packagist/dt/beyondcode/nova-tinker-tool.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-tinker-tool)

Use the power of Tinker within your Nova application.

![tinker screenshot](https://beyondco.de/github/nova-tinker-tool/screenshot.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require beyondcode/nova-tinker-tool
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function tools()
{
    return [
        // ...
        new \Beyondcode\TinkerTool\Tinker(),
    ];
}
```

## Usage

Click on the new "Tinker" menu item in your Nova application. You can enter any PHP code and press CMD+Enter / CTRL+Enter to evaluate the expression.
The return value will be displayed below.

The previous code and output will be stored in the localstorage in case you want to execute the same code snippets multiple times.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email marcel@beyondco.de instead of using the issue tracker.

## Credits

- [Marcel Pociot](https://github.com/mpociot)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
