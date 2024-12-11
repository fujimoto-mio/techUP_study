<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher;

/**
 * RedirectableUrlMatcherInterface knows how to redirect the user.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface RedirectableUrlMatcherInterface
{
    /**
     * Redirects the user to another URL and returns the parameters for the redirection.
     *
     * @param string      $path   The path info to redirect to
     * @param string      $route  The route name that matched
     * @param string|null $scheme The URL scheme (null to keep the current one)
     */
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/routing/Matcher/RedirectableUrlMatcherInterface.php
    public function redirect(string $path, string $route, ?string $scheme = null): array;
========
    public function redirect(string $path, string $route, ?string $scheme = null);
>>>>>>>> fc1dae76f6d528b2db14da9bf040759932246f6b:194_yamashita_haruka/Laravel_learning/vendor/symfony/routing/Matcher/RedirectableUrlMatcherInterface.php
}
