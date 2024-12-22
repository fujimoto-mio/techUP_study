<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\HttpKernel\CacheWarmer\WarmableInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 *
 * @final since Symfony 7.1
 */
class DataCollectorTranslator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface, WarmableInterface
{
    public const MESSAGE_DEFINED = 0;
    public const MESSAGE_MISSING = 1;
    public const MESSAGE_EQUALS_FALLBACK = 2;

    private TranslatorInterface $translator;
    private array $messages = [];

    /**
     * @param TranslatorInterface&TranslatorBagInterface&LocaleAwareInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        if (!$translator instanceof TranslatorBagInterface || !$translator instanceof LocaleAwareInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface, TranslatorBagInterface and LocaleAwareInterface.', get_debug_type($translator)));
        }

        $this->translator = $translator;
    }

    public function trans(?string $id, array $parameters = [], ?string $domain = null, ?string $locale = null): string
    {
        $trans = $this->translator->trans($id = (string) $id, $parameters, $domain, $locale);
        $this->collectMessage($locale, $domain, $id, $trans, $parameters);

        return $trans;
    }

    public function setLocale(string $locale): void
    {
        $this->translator->setLocale($locale);
    }

    public function getLocale(): string
    {
        return $this->translator->getLocale();
    }

    public function getCatalogue(?string $locale = null): MessageCatalogueInterface
    {
        return $this->translator->getCatalogue($locale);
    }

    public function getCatalogues(): array
    {
        return $this->translator->getCatalogues();
    }

    public function warmUp(string $cacheDir, ?string $buildDir = null): array
    {
        if ($this->translator instanceof WarmableInterface) {
            return (array) $this->translator->warmUp($cacheDir, $buildDir);
        }

        return [];
    }

    /**
     * Gets the fallback locales.
     */
    public function getFallbackLocales(): array
    {
        if ($this->translator instanceof Translator || method_exists($this->translator, 'getFallbackLocales')) {
            return $this->translator->getFallbackLocales();
        }

        return [];
    }

<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/translation/DataCollectorTranslator.php
    public function __call(string $method, array $args): mixed
========
    /**
     * @return mixed
     */
    public function __call(string $method, array $args)
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/symfony/translation/DataCollectorTranslator.php
    {
        return $this->translator->{$method}(...$args);
    }

    public function getCollectedMessages(): array
    {
        return $this->messages;
    }

    private function collectMessage(?string $locale, ?string $domain, string $id, string $translation, ?array $parameters = []): void
    {
        $domain ??= 'messages';

        $catalogue = $this->translator->getCatalogue($locale);
        $locale = $catalogue->getLocale();
        $fallbackLocale = null;
        if ($catalogue->defines($id, $domain)) {
            $state = self::MESSAGE_DEFINED;
        } elseif ($catalogue->has($id, $domain)) {
            $state = self::MESSAGE_EQUALS_FALLBACK;

            $fallbackCatalogue = $catalogue->getFallbackCatalogue();
            while ($fallbackCatalogue) {
                if ($fallbackCatalogue->defines($id, $domain)) {
                    $fallbackLocale = $fallbackCatalogue->getLocale();
                    break;
                }
                $fallbackCatalogue = $fallbackCatalogue->getFallbackCatalogue();
            }
        } else {
            $state = self::MESSAGE_MISSING;
        }

        $this->messages[] = [
            'locale' => $locale,
            'fallbackLocale' => $fallbackLocale,
            'domain' => $domain,
            'id' => $id,
            'translation' => $translation,
            'parameters' => $parameters,
            'state' => $state,
            'transChoiceNumber' => isset($parameters['%count%']) && is_numeric($parameters['%count%']) ? $parameters['%count%'] : null,
        ];
    }
}
