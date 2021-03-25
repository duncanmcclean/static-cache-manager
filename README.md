![Banner](https://raw.githubusercontent.com/doublethreedigital/static-cache-manager/master/banner.png)

## Addon Boilerplate

This repository contains the source code for Static Cache Manager, a simple little utility to clear paths in your static cache.

## Installation

1. Install via Composer `composer require doublethreedigital/static-cache-manager`
2. Publish configuration, assets etc `php artisan vendor:publish --provider="doublethreedigital/static-cache-manager"`

## Documentation

### Configuration

This addon provides its own configuration file. You can use this to configure the API keys and other options.

```php
return [
    //
];
```

## Security

From a security perspective, only the latest version will receive a security release if a vulnerability is found.

If you discover a security vulnerability within static-cache-manager, please report it [via email](mailto::vendorEmail) straight away. Please don't report security issues in the issue tracker.

## Resources

* [**Issue Tracker**](https://github.com/doublethreedigital/static-cache-manager/issues): Find & report bugs in static-cache-manager
* [**Discussions**](https://github.com/doublethreedigital/static-cache-manager/discussions): Get help and put forward feature requests
* [**Email**](mailto::vendorEmail): Support from the developer behind the addon

---

<p>
<a href="https://statamic.com"><img src="https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge" alt="Compatible with Statamic v3"></a>
<a href="https://packagist.org/packages/doublethreedigital/static-cache-manager/stats"><img src="https://img.shields.io/packagist/v/doublethreedigital/static-cache-manager?style=for-the-badge" alt="static-cache-manager on Packagist"></a>
</p>
