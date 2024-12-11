<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Session\Storage\Proxy\AbstractProxy;

/**
 * Allows session to be started by PHP and managed by Symfony.
 *
 * @author Drak <drak@zikula.org>
 */
class PhpBridgeSessionStorage extends NativeSessionStorage
{
<<<<<<<< HEAD:180_kuwahara_yuuhi/p-8/Laravel/Sample/vendor/symfony/http-foundation/Session/Storage/PhpBridgeSessionStorage.php
    public function __construct(AbstractProxy|\SessionHandlerInterface|null $handler = null, ?MetadataBag $metaBag = null)
========
    /**
     * @param AbstractProxy|\SessionHandlerInterface|null $handler
     */
    public function __construct($handler = null, ?MetadataBag $metaBag = null)
>>>>>>>> fc1dae76f6d528b2db14da9bf040759932246f6b:194_yamashita_haruka/Laravel_learning/vendor/symfony/http-foundation/Session/Storage/PhpBridgeSessionStorage.php
    {
        if (!\extension_loaded('session')) {
            throw new \LogicException('PHP extension "session" is required.');
        }

        $this->setMetadataBag($metaBag);
        $this->setSaveHandler($handler);
    }

    public function start(): bool
    {
        if ($this->started) {
            return true;
        }

        $this->loadSession();

        return true;
    }

    public function clear(): void
    {
        // clear out the bags and nothing else that may be set
        // since the purpose of this driver is to share a handler
        foreach ($this->bags as $bag) {
            $bag->clear();
        }

        // reconnect the bags to the session
        $this->loadSession();
    }
}
