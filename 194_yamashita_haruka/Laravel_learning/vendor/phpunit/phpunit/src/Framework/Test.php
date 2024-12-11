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
>>>>>>>> fc1dae76f6d528b2db14da9bf040759932246f6b:194_yamashita_haruka/Laravel_learning/vendor/phpunit/phpunit/src/Framework/Test.php
}
