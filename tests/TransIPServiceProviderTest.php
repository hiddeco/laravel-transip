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

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use TransIP\Laravel\TransIPFactory;
use TransIP\Laravel\TransIPManager;
use TransIP\Client;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testTransIPFactoryIsInjectable()
    {
        $this->assertIsInjectable(TransIPFactory::class);
    }

    public function testTransIPManagerIsInjectable()
    {
        $this->assertIsInjectable(TransIPManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(Client::class);

        $original = $this->app['transip.connection'];
        $this->app['transip']->reconnect();
        $new = $this->app['transip.connection'];

        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
