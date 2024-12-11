<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

/**
 * HelperInterface is the interface all helpers must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface HelperInterface
{
    /**
     * Sets the helper set associated with this helper.
     */
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/console/Helper/HelperInterface.php
    public function setHelperSet(?HelperSet $helperSet): void;
========
    public function setHelperSet(?HelperSet $helperSet = null);
>>>>>>>> fc1dae76f6d528b2db14da9bf040759932246f6b:194_yamashita_haruka/Laravel_learning/vendor/symfony/console/Helper/HelperInterface.php

    /**
     * Gets the helper set associated with this helper.
     */
    public function getHelperSet(): ?HelperSet;

    /**
     * Returns the canonical name of this helper.
     */
    public function getName(): string;
}
