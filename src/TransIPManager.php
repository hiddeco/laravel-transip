<?php

/*
 * This file is part of Laravel TransIP.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TransIP\Laravel;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * @method \TransIP\Api\Colocation colocation()
 * @method \TransIP\Api\Colocation colocation_service()
 * @method \TransIP\Api\Colocation colocationService()
 * @method \TransIP\Api\Domain     domain()
 * @method \TransIP\Api\Domain     domain_service()
 * @method \TransIP\Api\Domain     domainService()
 * @method \TransIP\Api\Forward    forward()
 * @method \TransIP\Api\Forward    forward_service()
 * @method \TransIP\Api\Forward    forwardService()
 * @method \TransIP\Api\Vps        vps()
 * @method \TransIP\Api\Vps        vps_service()
 * @method \TransIP\Api\Vps        vpsService()
 * @method \TransIP\Api\WebHosting hosting()
 * @method \TransIP\Api\WebHosting web_hosting()
 * @method \TransIP\Api\WebHosting webHosting()
 * @method \TransIP\Api\WebHosting web_hosting_service()
 * @method \TransIP\Api\WebHosting webHostingService()
 *
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \TransIP\Laravel\TransIPFactory
     */
    protected $factory;

    /**
     * Create a new TransIP manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \TransIP\Laravel\TransIPFactory  $factory
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
     * @return \TransIP\Laravel\TransIPFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
