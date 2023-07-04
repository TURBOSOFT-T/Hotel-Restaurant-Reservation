<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

use Predis\Response\ErrorInterface;
use Relay\Relay;

/**
 * Redis based session storage handler based on the Redis class
 * provided by the PHP redis extension.
 *
 * @author Dalibor Karlović <dalibor@flexolabs.io>
 */
class RedisSessionHandler extends AbstractSessionHandler
{
    /**
     * Key prefix for shared environments.
     */
    private string $prefix;

    /**
     * Time to live in seconds.
     */
    private int|\Closure|null $ttl;

    /**
     * List of available options:
     *  * prefix: The prefix to use for the keys in order to avoid collision on the Redis server
     *  * ttl: The time to live in seconds.
     *
     * @throws \InvalidArgumentException When unsupported client or options are passed
     */
    public function __construct(
        private \Redis|Relay|\RedisArray|\RedisCluster|\Predis\ClientInterface $redis,
        array $options = [],
    ) {
        if ($diff = array_diff(array_keys($options), ['prefix', 'ttl'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
        }

        $this->prefix = $options['prefix'] ?? 'sf_s';
        $this->ttl = $options['ttl'] ?? null;
    }

    protected function doRead(#[\SensitiveParameter] string $sessionId): string
    {
        return $this->redis->get($this->prefix.$sessionId) ?: '';
    }

    protected function doWrite(#[\SensitiveParameter] string $sessionId, string $data): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')), $data);
=======
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) $ttl, $data);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) $ttl, $data);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa

        return $result && !$result instanceof ErrorInterface;
    }

    protected function doDestroy(#[\SensitiveParameter] string $sessionId): bool
    {
        static $unlink = true;

        if ($unlink) {
            try {
                $unlink = false !== $this->redis->unlink($this->prefix.$sessionId);
            } catch (\Throwable) {
                $unlink = false;
            }
        }

        if (!$unlink) {
            $this->redis->del($this->prefix.$sessionId);
        }

        return true;
    }

    #[\ReturnTypeWillChange]
    public function close(): bool
    {
        return true;
    }

    public function gc(int $maxlifetime): int|false
    {
        return 0;
    }

    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $data): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->redis->expire($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')));
=======
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');

        return $this->redis->expire($this->prefix.$sessionId, (int) $ttl);
>>>>>>> 66597818 ( abdou a faire un poushe)
=======
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');

        return $this->redis->expire($this->prefix.$sessionId, (int) $ttl);
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
    }
}
