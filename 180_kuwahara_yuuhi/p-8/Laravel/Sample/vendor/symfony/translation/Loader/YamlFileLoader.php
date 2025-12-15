<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as YamlParser;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlFileLoader loads translations from Yaml files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class YamlFileLoader extends FileLoader
{
    private YamlParser $yamlParser;

    protected function loadResource(string $resource): array
    {
        if (!isset($this->yamlParser)) {
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/translation/Loader/YamlFileLoader.php
            if (!class_exists(YamlParser::class)) {
========
            if (!class_exists(\Symfony\Component\Yaml\Parser::class)) {
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/symfony/translation/Loader/YamlFileLoader.php
                throw new LogicException('Loading translations from the YAML format requires the Symfony Yaml component.');
            }

            $this->yamlParser = new YamlParser();
        }

        try {
            $messages = $this->yamlParser->parseFile($resource, Yaml::PARSE_CONSTANT);
        } catch (ParseException $e) {
            throw new InvalidResourceException(sprintf('The file "%s" does not contain valid YAML: ', $resource).$e->getMessage(), 0, $e);
        }

        if (null !== $messages && !\is_array($messages)) {
            throw new InvalidResourceException(sprintf('Unable to load file "%s".', $resource));
        }

        return $messages ?: [];
    }
}
