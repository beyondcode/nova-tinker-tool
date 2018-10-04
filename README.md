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
// in app/Providers/NovaServiceProvider.php

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

### Settings

By default this Pysh will attempt to write to ~/.pysh which for most will result in an error when trying to use tinker. To avoid this issue adding an environment variable to change where Pysh will write to will resolve this:
```bash
XDG_CONFIG_HOME=/path/to/new/location
```

### Security: Remote Code Execution

This should only be used for development and testing. Running tinker allows arbitrary code to be executed.

Any executed php code will have the same access as the running php instance. This means that the running application may be altered, and if run with root privileges, one can get complete control of the machine. 

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
