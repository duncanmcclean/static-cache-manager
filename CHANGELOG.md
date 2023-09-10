# Changelog

## Unreleased

## v3.1.2 (2023-09-10)

### What's improved

* Multi-site is now actually supported! #21 by @martyf

## v3.1.1 (2023-07-09)

### What's fixed

* Fixed utility not being registered properly #20

## v3.1.0 (2023-06-13)

### What's new

* Added back PHP 8.1 support #19

## v3.0.0 (2023-04-28)

### What's new

- Static Cache Manager v3 now supports Statamic 4 #16

### Upgrade guide

1. In your site's `composer.json` file, replace `doublethreedigital/static-cache-manager` with `duncanmcclean/static-cache-manager`
2. Then, change the addon's version constraint to `^3.0`

## v2.1.0 (2023-01-28)

### What's new

- Statamic 3.4 Support

## v2.0.0 (2022-12-29)

The supported versions of PHP/Statamic/Laravel used alongside this addon have changed, the supported versions are now:

- PHP 8.1 & 8.2
- Statamic 3.3
- Laravel 9

## v1.2.1 (2022-03-08)

### What's improved

- Finally added an icon to the utility
- Made the textbox work a little bit better for smaller screen sizes

## v1.2.0 (2022-02-26)

### What's new

- Statamic 3.3 support

### Breaking changes

- Dropped support for Statamic 3.0 and Statamic 3.1

## v1.1.1 (2022-02-23)

### What's fixed

- Versions of a page with query parameters will now actually get cleared #10 #12 by @duncanmcclean

## v1.1.0 (2022-01-21)

### What's fixed

- When you enter a path, you couldn't previously start it with a `/` or it wouldn't do anything #8 #9
- If you were wanting to clear a cached file like `whats-on_.html`, entering `whats-on` wouldn't do anything because it would look for the wrong path (`whats-on`, instead of `whats-on_.html`) #9

## v1.0.1 (2021-08-19)

### What's new

- Support for [Statamic 3.2](https://statamic.com/blog/statamic-3.2-beta)

## v1.0.0 (2021-04-05)

- Initial release

```

```
