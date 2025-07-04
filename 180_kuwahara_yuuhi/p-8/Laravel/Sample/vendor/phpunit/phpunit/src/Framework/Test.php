<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use Countable;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
interface Test extends Countable
{
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/phpunit/phpunit/src/Framework/Test.php
    public function run(): void;
========
    /**
     * Runs a test and collects its result in a TestResult instance.
     */
    public function run(?TestResult $result = null): TestResult;
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/phpunit/phpunit/src/Framework/Test.php
}
