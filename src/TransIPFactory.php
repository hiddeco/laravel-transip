<?php

/*
 * This file is part of Laravel TransIP.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HiddeCo\LaravelTransIP;

use TransIP\Client;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPFactory
{
    /**
     * Make a new TransIP client.
     *
     * @param array $config
     *
     * @return \HiddeCo\TransIP\Client
     */
    public function create(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        if (0 === count(array_diff(['username', 'private_key'], array_keys($config)))) {
            return array_only($config, ['username', 'private_key', 'mode', 'endpoint']);
        }

        throw new \InvalidArgumentException('The TransIP client requires configuration.');
    }

    /**
     * Get the TransIP client.
     *
     * @param string[] $config
     *
     * @return \TransIP\Client
     */
    protected function getClient(array $config)
    {
        return new Client(
            $config['username'],
            $config['private_key'],
            (isset($config['mode'])) ? $config['mode'] : 'readonly',
            (isset($config['endpoint'])) ? $config['endpoint'] : 'api.transip.nl'
        );
    }
}
