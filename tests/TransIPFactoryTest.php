<?php

/*
 * This file is part of Laravel TransIP.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HiddeCo\Tests\LaravelTransIP;

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use HiddeCo\LaravelTransIP\TransIPFactory;
use TransIP\Client;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPFactoryTest extends AbstractTestBenchTestCase
{
    public function testCreate()
    {
        $factory = $this->getTransIPFactory();

        $return = $factory->create([
            'username'      => 'transip-username',
            'private_key'   => 'transip-private-key',
        ]);

        $this->assertInstanceOf(Client::class, $return);
    }

    public function testCreateModeEndpoint()
    {
        $factory = $this->getTransIPFactory();

        $return = $factory->create([
            'username'      => 'transip-username',
            'private_key'   => 'transip-private-key',
            'mode'          => 'readwrite',
            'endpoint'      => 'api.transip.co.uk',
        ]);

        $this->assertInstanceOf(Client::class, $return);
        $this->assertEquals('api.transip.co.uk', $return->getEndpoint());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateException()
    {
        $factory = $this->getTransIPFactory();
        $factory->create([
            'mode'      => 'readwrite',
            'endpoint'  => 'api.transip.co.uk',
        ]);
    }

    protected function getTransIPFactory()
    {
        return new TransIPFactory();
    }
}
