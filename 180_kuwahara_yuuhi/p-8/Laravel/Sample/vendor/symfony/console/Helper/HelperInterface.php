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
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:194_yamashita_haruka/再提出Level8-1 API/vendor/symfony/console/Helper/HelperInterface.php

    /**
     * Gets the helper set associated with this helper.
     */
    public function getHelperSet(): ?HelperSet;

    /**
     * Returns the canonical name of this helper.
     */
    public function getName(): string;
}
