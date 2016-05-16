<?php

/*
 * This file is part of Laravel HTTP Adapter.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TransIP\Tests\Laravel\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use TransIP\Laravel\Facades\TransIP;
use TransIP\Laravel\TransIPManager;
use TransIP\Tests\Laravel\AbstractTestCase;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIPTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'transip';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    public function getFacadeClass()
    {
        return TransIP::class;
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return TransIPManager::class;
    }
}
