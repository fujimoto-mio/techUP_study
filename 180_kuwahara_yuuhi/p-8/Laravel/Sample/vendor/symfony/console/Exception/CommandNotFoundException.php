<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Exception;

/**
 * Represents an incorrect command name typed in the console.
 *
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */
class CommandNotFoundException extends \InvalidArgumentException implements ExceptionInterface
{
    /**
     * @param string          $message      Exception message to throw
     * @param string[]        $alternatives List of similar defined names
     * @param int             $code         Exception code
     * @param \Throwable|null $previous     Previous exception used for the exception chaining
     */
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/console/Exception/CommandNotFoundException.php
    public function __construct(
        string $message,
        private array $alternatives = [],
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
========
    public function __construct(string $message, array $alternatives = [], int $code = 0, ?\Throwable $previous = null)
    {
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/symfony/console/Exception/CommandNotFoundException.php
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string[]
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }
}
