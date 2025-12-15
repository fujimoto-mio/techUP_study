Translation Component
=====================

The Translation component provides tools to internationalize your application.

Getting Started
---------------

```bash
composer require symfony/translation
```

```php
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

$translator = new Translator('fr_FR');
$translator->addLoader('array', new ArrayLoader());
$translator->addResource('array', [
    'Hello World!' => 'Bonjour !',
], 'fr_FR');

echo $translator->trans('Hello World!'); // outputs « Bonjour ! »
```

Sponsor
-------

<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/translation/README.md
The Translation component for Symfony 7.1 is [backed][1] by:

 * [Crowdin][2], a cloud-based localization management software helping teams to go global and stay agile.

Help Symfony by [sponsoring][3] its development!
========
Help Symfony by [sponsoring][1] its development!
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/symfony/translation/README.md

Resources
---------

 * [Documentation](https://symfony.com/doc/current/translation.html)
 * [Contributing](https://symfony.com/doc/current/contributing/index.html)
 * [Report issues](https://github.com/symfony/symfony/issues) and
   [send Pull Requests](https://github.com/symfony/symfony/pulls)
   in the [main Symfony repository](https://github.com/symfony/symfony)

[1]: https://symfony.com/sponsor
