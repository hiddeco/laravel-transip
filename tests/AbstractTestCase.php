<?php

/*
 * This file is part of Laravel TransIP.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TransIP\Tests\Laravel;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use TransIP\Laravel\TransIPServiceProvider;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return TransIPServiceProvider::class;
    }
}
