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
>>>>>>>> fc1dae76f6d528b2db14da9bf040759932246f6b:194_yamashita_haruka/Laravel_learning/vendor/symfony/console/Exception/CommandNotFoundException.php
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
