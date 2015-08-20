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

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * @method \HiddeCo\TransIP\Api\Colocation colocation()
 * @method \HiddeCo\TransIP\Api\Colocation colocation_service()
 * @method \HiddeCo\TransIP\Api\Colocation colocationService()
 * @method \HiddeCo\TransIP\Api\Domain     domain()
 * @method \HiddeCo\TransIP\Api\Domain     domain_service()
 * @method \HiddeCo\TransIP\Api\Domain     domainService()
 * @method \HiddeCo\TransIP\Api\Forward    forward()
 * @method \HiddeCo\TransIP\Api\Forward    forward_service()
 * @method \HiddeCo\TransIP\Api\Forward    forwardService()
 * @method \HiddeCo\TransIP\Api\Vps        vps()
 * @method \HiddeCo\TransIP\Api\Vps        vps_service()
 * @method \HiddeCo\TransIP\Api\Vps        vpsService()
 * @method \HiddeCo\TransIP\Api\WebHosting hosting()
 * @method \HiddeCo\TransIP\Api\WebHosting web_hosting()
 * @method \HiddeCo\TransIP\Api\WebHosting webHosting()
 * @method \HiddeCo\TransIP\Api\WebHosting web_hosting_service()
 * @method \HiddeCo\TransIP\Api\WebHosting webHostingService()
 *
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \HiddeCo\LaravelTransIP\TransIPFactory
     */
    protected $factory;

    /**
     * Create a new TransIP manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \HiddeCo\LaravelTransIP\TransIPFactory  $factory
     */
    public function __construct(Repository $config, TransIPFactory $factory)
    {
        parent::__construct($config);
        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return \HiddeCo\TransIP\Client
     */
    protected function createConnection(array $config)
    {
        return $this->factory->create($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'transip';
    }

    /**
     * Get the factory instance.
     *
     * @return \HiddeCo\LaravelTransIP\TransIPFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
