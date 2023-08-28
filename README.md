# Static Cache Manager

Static Cache Manager is a simple Control Panel utility to clear specific paths in your site's static cache.

## Installation

First, require Static Cache Manager as a Composer dependency:

```
composer require duncanmcclean/static-cache-manager
```

And that's you done! The utility should now show in the Control Panel.

## Documentation

### Usage

1. Go to Utilities in the Statamic CP
2. Click on 'Static Cache Manager'
3. Enter in the paths you'd like to clear and click 'Clear' (you may provide wildcards: eg. `/news/2022/*`)
4. Hey presto! Static caching paths have been cleared.

## Support

If you find a bug, have some question or have a feature request, please open a [GitHub Issue or Discussion](https://github.com/duncanmcclean/static-cache-manager/issues/new/choose).

> Please note: only the latest version of this addon is supported. Any bug reports regarding an old version will be closed.

<!-- statamic:hide -->

## Contributing

Contributions are welcome, and are accepted via pull requests. You should follow this process when contributing:

1. Fork the repository
2. Make your code change
3. Open a pull request, detailing the changes you've made.
4. Ensure StyleCI isn't reporting any code-style errors. If it is, you should resolve those.

If your pull request is a Work in Progress, please mark your pull request as a draft.

## Security

If you've found a bug regarding security please email security@doublethree.digital instead of using the issue tracker.

<!-- /statamic:hide -->
